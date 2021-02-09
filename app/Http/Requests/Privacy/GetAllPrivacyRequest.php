<?php

namespace App\Http\Requests\Privacy;

use App\Models\PrivacyPolicy;
use Illuminate\Foundation\Http\FormRequest;

class GetAllPrivacyRequest extends FormRequest
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
            //
        ];
    }

    public function handle()
    {
        return PrivacyPolicy::all();
    }
}
