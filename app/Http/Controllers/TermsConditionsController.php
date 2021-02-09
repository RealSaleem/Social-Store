<?php

namespace App\Http\Controllers;

use App\Http\Requests\Terms\CreateTermsRequest;
use App\Http\Requests\Terms\GetAllTermsRequest;
use App\Http\Requests\Terms\UpdateTermsRequest;
use App\Models\TermsConditions;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllTermsRequest $request)
    {
        $terms = $request->handle();
        return view('terms.index' , compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTermsRequest $request)
    {
        $request->handle();
        return redirect()->route('terms.index')->withSuccess('Record Has Been Added Successfully');
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
        $terms = TermsConditions::where('id' , $id)->first();
        return view('terms.form.edit', compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermsRequest $request, $id)
    {
        $request['id'] = $id;
        $request->handle();

        return redirect()->route('terms.index')->with('success' , 'Record has been updated successfully');
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
