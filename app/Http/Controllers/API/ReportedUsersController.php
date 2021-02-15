<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\ReportedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportedUsersController extends Controller
{
    public $successStatus = 200;
    public $HTTP_FORBIDDEN = 403;
    public $HTTP_NOT_FOUND = 404;

    public function reporteduser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'   =>  'required',
            'against_id'    =>  'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Validation error.', 'data' => $validator->errors()->all()[0]]);
        }
        $input = $request->all();
        $reporteduser = ReportedUser::create($input);
        $success['user_id'] = $reporteduser->user_id;
        $success['against_id'] = $reporteduser->against_id;

        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
    }
}
