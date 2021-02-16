<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    public $successStatus = 200;
    public $HTTP_FORBIDDEN = 403;
    public $HTTP_NOT_FOUND = 404;

    public function ads(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name'  =>  'required',
            'price' =>  'required',
            'description'   =>  'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type'  =>  'required',
            'duration'  =>  'required'
        ]);
// dd($request->all());
        if ($validator->fails()) {
            return response()->json(['error' => false, 'status' => $this->HTTP_NOT_FOUND, 'message' => 'Validation error.', 'data' => $validator->errors()->all()[0]]);
        }
        $input = $request->all();
        $ads = Ads::create($input);
        $success['product_name'] = $ads->product_name;
        $success['price']   =   $ads->price;
        $success['description'] =   $ads->description;
        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = storage_path() . '/uploads/images/';
            $file->move($destinationPath, $fileName);
            $ads->image = '/uploads/images/' . $fileName;
            // dd(storage_path(),public_path());
        }
        $success['image'] = $ads->image;
        $success['type']    =   $ads->type;
        $success['duration']    =   $ads->duration;
        return response()->json(['success' => true, 'status' => $this->successStatus, 'message' => 'Record found.', 'data' => $success]);
    }
}
