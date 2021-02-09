<?php

namespace App\Http\Requests\Country;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest
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
            'image' => ['required'],
        ];
    }

    public function handle()
    {
        $params = $this->all();
        $country = new Country();
        $country->name_en = $params['name_en'];
        $country->name_ar = $params['name_ar'];
        if($this->hasFile('image'))
        {
            $image_path = $this->file('image')->store('uploads/images');
            $country->image = $image_path;
        }
        $country->save();

        return $country;
    }
}
