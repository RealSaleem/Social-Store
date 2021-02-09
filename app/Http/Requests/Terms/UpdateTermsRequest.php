<?php

namespace App\Http\Requests\Terms;

use App\Models\TermsConditions;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTermsRequest extends FormRequest
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
        $id = $params['id'];
        $terms = TermsConditions::where('id' , $id)->first();
        $terms->title_en = $params['title_en'];
        $terms->title_ar = $params['title_ar'];
        $terms->description_en = $params['description_en'];
        $terms->description_ar = $params['description_ar'];
        $terms->save();

        return $terms;
    }
}
