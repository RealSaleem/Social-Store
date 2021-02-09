<?php

namespace App\Http\Controllers;

use App\Http\Requests\Privacy\CreatePrivacyRequest;
use App\Http\Requests\Privacy\GetAllPrivacyRequest;
use App\Http\Requests\Privacy\UpdatePrivacyRequest;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllPrivacyRequest $request)
    {
        $privacy = $request->handle();
        return view('privacy.index', compact('privacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('privacy.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePrivacyRequest $request)
    {
        $request->handle();
        return redirect()->route('privacy.index')->withSuccess('Record Has Been Added Successfully');
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
        $privacy = PrivacyPolicy::where('id' , $id)->first();
        // dd($privacy);
        return view('privacy.form.edit', compact('privacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrivacyRequest $request, $id)
    {
        $request['id'] = $id;
        $request->handle();

        return redirect()->route('privacy.index')->with('success' , 'Record has been updated successfully');
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
}
