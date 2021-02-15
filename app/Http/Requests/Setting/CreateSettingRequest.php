<?php

namespace App\Http\Requests\Setting;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class CreateSettingRequest extends FormRequest
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
            'facebook_url'  =>   ['required'],
            'twitter_url'   =>  ['required'],
            'instagram_url' =>  ['required'],
            'promotion_price'   =>  ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();
        $setting = new Setting();
        $setting->facebook_url  =   $params['facebook_url'];
        $setting->twitter_url   =   $params['twitter_url'];
        $setting->instagram_url =   $params['instagram_url'];
        $setting->promotion_price   =   $params['promotion_price'];
        $setting->save();
        return $setting;
    }
}
