<?php

namespace App\Http\Requests\User;

use App\Models\API\AppUser;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'user_name' =>  ['required','unique:app_users'],
            'first_name'    =>  ['required'],
            'last_name' =>  ['required'],
            'email' =>  ['required','unique:app_users'],
            'password'  =>  ['required','string','min:6','regex:/^(?=.*?[#?!@$.%^&*-]).{6,}$/'],
            'phone' =>  ['required','unique:app_users'],
            'country_id'    =>  ['required'],
            'category_id'   =>  ['required'],
            'image' =>  ['required'],
        ];
    }

    public function handle()
    {
        $params = $this->all();
        $appusers = new AppUser();
        $appusers->user_name = $params['user_name'];
        $appusers->first_name = $params['first_name'];
        $appusers->last_name = $params['last_name'];
        $appusers->email = $params['email'];
        $appusers->password = $params['password'];
        $appusers->phone = $params['phone'];
        $appusers->country_id = $params['country_id'];
        $appusers->category_id = $params['category_id'];
        {
            $image_path = $this->file('image')->store('uploads/images');
            $appusers->image = $image_path;
        }
        $appusers->save();
        return $appusers;
    }
}
