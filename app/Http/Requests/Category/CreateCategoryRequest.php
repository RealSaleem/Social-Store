<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'image' => ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();
        // dd($params);
        // unset($params['_token']);
        // Category::create($params);

        $category = new Category();
        $category->name_en = $params['name_en'];
        $category->name_ar = $params['name_ar'];
        if($this->hasFile('image'))
        {
            $image_path = $this->file('image')->store('uploads/images');
            $category->image = $image_path;
        }
        $category->save();

        return $category;
    }
}
