<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function imageUplaod(\Illuminate\Http\Request $request)
    {
        $rules = ['image' => 'required|max:40000|dimensions:min_width=200,min_height=200'];
        $messages = [
            'max' => 'The :attribute size can not exceed 4MB',
            'dimensions' => 'The :attribute size must be at least 200 * 200'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $file = $request->file('image');
        $path = url('/').'/storage/'.$request->image->store('uploads/images');
        $response = [
            'name'  => $file->getClientOriginalName(),
            'path'  => $path,
            'size'  => $file->getSize(),
        ];
        return response()->json($response);
    }
}
