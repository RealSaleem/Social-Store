<?php

namespace App\Http\Requests\Ads;

use App\Models\AdsImage;
use App\Models\API\Ads;
use Illuminate\Foundation\Http\FormRequest;

class CreateAdsRequest extends FormRequest
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
            'app_user_id'   =>  ['required'],
            'product_name_en' => ['required'],
            'price' =>  ['required'],
            'description_en'   =>  ['required'],
            'images' =>  ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();
        // dd($params);
        $ads = new Ads();
        $ads->app_user_id   =   $params['app_user_id'];
        $ads->product_name_en  =   $params['product_name_en'];
        $ads->product_name_ar  =   $params['product_name_ar'];
        $ads->price =   $params['price'];
        $ads->type  =   $params['type'];
        $ads->description_en   =   $params['description_en'];
        $ads->description_ar   =   $params['description_ar'];
        $ads->duration  =   $params['duration'];
        $ads->save();
        if($this->images != null)
        {
            foreach($this->images as $image)
            {
                $productImage               = new AdsImage();
                $productImage->ads_id       = $ads->id; 
                $productImage->name         = $image['name']; 
                $productImage->url          = $image['path']; 
                $productImage->size         = $image['size'];
                $productImage->save(); 
            }
        }
        return $ads;
    }
}
