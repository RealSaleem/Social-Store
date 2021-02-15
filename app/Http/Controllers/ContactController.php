<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\GetAllContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\API\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllContactRequest $request)
    {
        $contacts = $request->handle();
        return view('contact.index' , compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::where('id' , $id)->first();
        return view('contact.form.edit' , compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, $id)
    {
        $request['id'] = $id;
        $request->handle();

        return redirect()->route('contact.index')->with('success' , "record has been updated successfully" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//     public function contactStatus($id)
//     {
//         $contacts = Contact::find($id);
//         // dd($contacts);
//         if($contacts->status == 'viewed'){
//             $contacts->status = 'new';
//         } else{
//             $contacts->status = 'viewed';
//         }
//         $contacts->save();
// // dd($contacts);
//         return response()->json(['success' => true]);
//     }
}
