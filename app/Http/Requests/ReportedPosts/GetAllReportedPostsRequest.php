<?php

namespace App\Http\Requests\ReportedPosts;

use App\Models\API\ReportedPosts;
use Illuminate\Foundation\Http\FormRequest;

class GetAllReportedPostsRequest extends FormRequest
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
        return ReportedPosts::with('appuser', 'ads.appuser')->get();
    }
}
