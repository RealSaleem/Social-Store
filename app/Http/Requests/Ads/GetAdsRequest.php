<?php

namespace App\Http\Requests\Ads;

use App\Models\API\Ads;
use Illuminate\Foundation\Http\FormRequest;

class GetAdsRequest extends FormRequest
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
        $ads =  Ads::with('appuser' , 'images')->find($this->id);
        return $ads;
    }
}
