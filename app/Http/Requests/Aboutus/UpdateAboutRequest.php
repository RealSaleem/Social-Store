<?php

namespace App\Http\Requests\Aboutus;

use App\Models\Aboutus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
        
        // dd($this->id, $params['id']);
        $id = $params['id'];
        $aboutus = Aboutus::where('id' , $id )->first();
        $aboutus->title_en = $params['title_en'];
        $aboutus->title_ar = $params['title_ar'];
        $aboutus->description_en = $params['description_en'];
        $aboutus->description_ar = $params['description_ar'];
        $aboutus->save();

        return $aboutus;
    }
}
