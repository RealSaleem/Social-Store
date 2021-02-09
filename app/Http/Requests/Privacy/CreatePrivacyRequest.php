<?php

namespace App\Http\Requests\Privacy;

use App\Models\PrivacyPolicy;
use Illuminate\Foundation\Http\FormRequest;

class CreatePrivacyRequest extends FormRequest
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
            'title_en' => ['required'],
            'description_en' => ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();
        $privacy = new PrivacyPolicy();
        $privacy->title_en = $params['title_en'];
        $privacy->title_ar = $params['title_ar'];
        $privacy->description_en = $params['description_en'];
        $privacy->description_ar = $params['description_ar'];
        $privacy->save();

        return $privacy;

    }
}
