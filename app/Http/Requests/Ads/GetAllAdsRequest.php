<?php

namespace App\Http\Requests\Ads;

use App\Models\API\Ads;
use Illuminate\Foundation\Http\FormRequest;

class GetAllAdsRequest extends FormRequest
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
        $ads =  Ads::with('appuser');
        if (isset($this->ads_id)) {
            $ads = $ads->where('id', $this->ads_id);
        }
        return $ads->get();
    }
}
