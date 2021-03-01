<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\AccountActivation;
use App\Mail\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;

use DB;
use Hash;
use App\User;

class AppUserController extends Controller
{
    public $successStatus = 200;
    public $HTTP_FORBIDDEN = 403;
    public $HTTP_NOT_FOUND = 404;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request)
    {
        $user = AppUser::where('user_name', $request->user_name)->orWhere('phone', $request->phone)->orWhere('email', $request->email)->first();
        if($user->verified_token == NULL){
              if (Auth::guard('app_user')->attempt(['email' => request('email'), 'password' => request('password')])) {
            $app_user = Auth::guard('app_user')->user();
            $success['id'] = $app_user->id;
            $success['user_name'] = $app_user->user_name;
            $success['email'] = $app_user->email;
            $success['phone'] = $app_user->phone;
            $success['category_id'] = $app_user->category_id;
            $success['country_id'] = $app_user->country_id;
            // $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
        } else {
            return response()->json(['error' => false, 'status' => 401, 'message' => 'These credentials does not match our records.', 'data' => []]);
        }

        }
        else{
            return response()->json(['error' => false, 'status' => 401, 'message' => 'please verify your email first then try to login again', 'data' => []]);
        }
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|unique:app_users,user_name',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|string|min:6|regex:/^(?=.*?[#?!@$.%^&*-]).{6,}$/',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|unique:app_users,phone',
            'category_id' => 'required',
            'country_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Validation error.', 'data' => $validator->errors()->all()[0]]);
        }
        $verfied_token = Str::random(40);
        $input = $request->all();
        $input['verified_token'] = $verfied_token;
        // dd($input);
        $input['password'] = bcrypt($input['password']);
        $user = AppUser::create($input);
        Mail::to($input['email'])->send(new AccountActivation($user));
        // $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['user_name'] =  $user->user_name;
        $success['first_name'] = $user->first_name;
        $success['last_name'] = $user->last_name;
        $success['email'] = $user->email;
        $success['phone'] = $user->phone;
        $success['verified_token'] = $user->verified_token;

        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = storage_path() . '/uploads/images/';
            $file->move($destinationPath, $fileName);
            $user->image = '/uploads/images/' . $fileName;
            // dd(storage_path(),public_path());
        }
        $success['image'] = $user->image;
       
        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
    }

    public function activateAccount($token){
        $app_user = AppUser::where('verified_token', $token)->first();
        if($app_user == null){
            return response()->json(['message' => 'User not found']);
        }
        $app_user->verified_token = null;
        $app_user->save();
        return view('thankyou', ['account_activated' => true]);
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function reset_password_request(Request $req)
    {        
        $email = AppUser::where('email',$req->email)->first();
        if($email)
        {
         DB::table('password_resets')->insert([
        'email' => $req->email,
        'token' => mt_rand(1000,9999), //change 60 to any length you want
        'created_at' => Carbon::now()
        ]);
         $tokenData = DB::table('password_resets')->where('email', $req->email)->first();
        $token = $tokenData->token;
        $email = $req->email;
        $data =['email' => $req->email,
                'token' => $token];

        Mail::to($req->email)->send(new PasswordReset($data));
        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Verification Email has sent to your email address', 'data' => []]);
        }else{
        return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Invalid email address.']);
        }   
        
    }

    public function verfy_token(Request $token_req){

        $check = DB::table('password_resets')->where('token',$token_req->token)->first();
        if(!$check){
             return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'code not matched.']
         );
        }else{
             return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'code matched.', 'data' => $check]);
        }
    }

    public function reset_password(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'password'          => 'required|string|min:6|regex:/^(?=.*?[#?!@$.%^&*-]).{6,}$/',
            'confirm_password'  => 'required|string|min:6|regex:/^(?=.*?[#?!@$.%^&*-]).{6,}$/',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Validation error.', 'data' => $validator->errors()->all()[0]]);
        }else{
            if($request->password == $request->confirm_password){
                    $email = $request->email;
                    $check =  AppUser::where('email',$email)->update([
                        'password' => $request->password
                    ]);
                    if($check){
                        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Password updated successfully.', 'data' => []]);
                    }}else
                    {
                        return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'password not matched.']
         );
                    }
            }
    }




}
