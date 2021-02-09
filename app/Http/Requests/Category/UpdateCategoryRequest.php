<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $category = Category::where('id' , $id )->first();
        $category->name_en = $params['name_en'];
        $category->name_ar = $params['name_ar'];
        if($this->hasFile('image') && isset($params['image']))
        {
            \App\Helpers\Helper::deleteAttachment($category->image);
            $image_path = $this->file('image')->store('uploads/images');
            $category->image = $image_path;
        } else if($params['hidden_image'] == null){
            \App\Helpers\Helper::deleteAttachment($category->image);
            $category->image = null;
        }
        $category->save();

        return $category;
    }
}
