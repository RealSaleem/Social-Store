<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\ReportedPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportedPostsController extends Controller
{
    public $successStatus = 200;
    public $HTTP_FORBIDDEN = 403;
    public $HTTP_NOT_FOUND = 404;

    public function reportedposts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app_user_id'   =>  'required',
            'ads_id'    =>  'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Validation error.', 'data' => $validator->errors()->all()[0]]);
        }
        $input = $request->all();
        $reportedposts = ReportedPosts::create($input);
        $success['app_user_id'] = $reportedposts->app_user_id;
        $success['ads_id'] = $reportedposts->ads_id;

        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
    }
}
