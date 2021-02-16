<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ads\CreateAdsRequest;
use App\Http\Requests\Ads\GetAllAdsRequest;
use App\Http\Requests\Ads\UpdateAdsRequest;
use App\Models\API\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllAdsRequest $request)
    {
        $ads = $request->handle();
        // dd($ads);
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdsRequest $request)
    {
        $request->handle();
        return redirect()->route('ads.index')->withSuccess('Record Has Been Added Successfully');
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
        $ads = Ads::where('id', $id)->first();
        return view('ads.form.edit', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdsRequest $request, $id)
    {
        $request['id'] = $id;
        $request->handle();
        return redirect()->route('ads.index')->with('success', "record has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::find($id);
        \App\Helpers\Helper::deleteAttachment($ads->image);
        $ads->delete();
        return redirect()->route('ads.index');
    }
}
