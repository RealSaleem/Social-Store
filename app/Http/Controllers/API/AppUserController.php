<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\AccountActivation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        if (Auth::guard('app_user')->attempt(['email' => request('email'), 'password' => request('password')])) {
            $app_user = Auth::guard('app_user')->user();
            $success['id'] = $app_user->id;
            $success['user_name'] = $app_user->user_name;
            $success['email'] = $app_user->email;
            $success['phone'] = $app_user->phone;
            $success['category_id'] = $app_user->category_id;
            $success['country_id'] = $app_user->country_id;
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
        } else {
            return response()->json(['error' => false, 'status' => 401, 'message' => 'These credentials does not match our records.', 'data' => []]);
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $success['token'] =  $user->createToken('MyApp')->accessToken;
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
        // Mail::to($input['email'])->send(new AccountActivation($user));
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
}
