<?php

namespace App\Http\Requests\User;

use App\Models\API\AppUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' =>  ['required'],
            'first_name'    =>  ['required'],
            'last_name' =>  ['required'],
            'email' =>  ['required'],
            'password'  =>  ['required','string','min:6','regex:/^(?=.*?[#?!@$.%^&*-]).{6,}$/'],
            'phone' =>  ['required'],
            // 'country_id'    =>  ['required'],
            // 'category_id'   =>  ['required'],
            // 'image' =>  ['required'],
        ];
    }

    public function handle()
    {
        $params = $this->all();
        
        // dd($this->id, $params['id']);
        $id = $params['id'];
        $appusers = AppUser::where('id' , $id )->first();
        $appusers->user_name = $params['user_name'];
        $appusers->first_name = $params['first_name'];
        $appusers->last_name = $params['last_name'];
        $appusers->email = $params['email'];
        $appusers->password = $params['password'];
        $appusers->phone = $params['phone'];
        // $appusers->country_id = $params['country_id'];
        // $appusers->category_id = $params['category_id'];
       
     
        if($this->hasFile('image') && isset($params['image']))
        {
            \App\Helpers\Helper::deleteAttachment($appusers->image);
            $image_path = $this->file('image')->store('uploads/images');
            $appusers->image = $image_path;
        } else if($params['hidden_image'] == null){
            \App\Helpers\Helper::deleteAttachment($appusers->image);
            $appusers->image = null;
        }
        $appusers->save();

        return $appusers;
    }
}
