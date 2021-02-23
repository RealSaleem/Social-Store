<?php

namespace App\Http\Requests\Ads;

use App\Models\AdsImage;
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
            'app_user_id'   =>  ['required'],
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
        $ads->app_user_id   =   $params['app_user_id'];
        $ads->product_name  =   $params['product_name'];
        $ads->price =   $params['price'];
        $ads->type  =   $params['type'];
        $ads->description   =   $params['description'];
        $ads->duration  =   $params['duration'];
        $ads->save();
        if($this->images != null)
        {
            AdsImage::where('ads_id', $ads->id)->delete();
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
