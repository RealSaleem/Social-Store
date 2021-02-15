<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public $successStatus = 200;
    public $HTTP_FORBIDDEN = 403;
    public $HTTP_NOT_FOUND = 404;

    public function contactus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'email' =>  'required|email|unique:contacts,email',
            'phone' => 'required|unique:contacts,phone',
            'message' => 'required', 
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Validation error.', 'data' => $validator->errors()->all()[0]]);
        }
        $input = $request->all();
        $contact = Contact::create($input);
        $success['customer_name'] = $contact->customer_name;
        $success['email'] = $contact->email;
        $success['phone'] = $contact->phone;
        $success['message'] = $contact->message;

        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
    }
}
