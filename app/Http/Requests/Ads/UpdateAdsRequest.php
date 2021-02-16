<?php

namespace App\Http\Requests\Ads;

use App\Models\API\Ads;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdsRequest extends FormRequest
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
            'product_name' => ['required'],
            'price' =>  ['required'],
            'description'   =>  ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();
        $id = $params['id'];
        $ads = Ads::where('id' , $id)->first();
        $ads->product_name  =   $params['product_name'];
        $ads->price =   $params['price'];
        $ads->type  =   $params['type'];
        $ads->description   =   $params['description'];
        $ads->duration  =   $params['duration'];
        if($this->hasFile('image'))
        {
            $image_path = $this->file('image')->store('uploads/images');
            $ads->image = $image_path;
        }
        $ads->save();
        return $ads;
    }
}
