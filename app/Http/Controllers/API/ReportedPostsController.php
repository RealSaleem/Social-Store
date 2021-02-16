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
            'reporter_id'   =>  'required',
            'item_id'    =>  'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Validation error.', 'data' => $validator->errors()->all()[0]]);
        }
        $input = $request->all();
        $reportedposts = ReportedPosts::create($input);
        $success['reporter_id'] = $reportedposts->reporter_id;
        $success['item_id'] = $reportedposts->item_id;

        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
    }
}
