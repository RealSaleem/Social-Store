<?php

namespace App\Http\Requests\Country;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
            'name_en' => ['required'],
        ];
    }

    public function handle()
    {
        $params = $this->all();
        
        // dd($this->id, $params['id']);
        $id = $params['id'];
        $country = Country::where('id' , $id )->first();
        $country->name_en = $params['name_en'];
        $country->name_ar = $params['name_ar'];
        if($this->hasFile('image') && isset($params['image']))
        {
            \App\Helpers\Helper::deleteAttachment($country->image);
            $image_path = $this->file('image')->store('uploads/images');
            $country->image = $image_path;
        } else if($params['hidden_image'] == null){
            \App\Helpers\Helper::deleteAttachment($country->image);
            $country->image = null;
        }
        $country->save();

        return $country;
    }
}
