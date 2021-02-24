<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ads\CreateAdsRequest;
use App\Http\Requests\Ads\GetAdsRequest;
use App\Http\Requests\Ads\GetAllAdsRequest;
use App\Http\Requests\Ads\UpdateAdsRequest;
use App\Models\API\Ads;
use App\Models\API\AppUser;
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
        $appusers = AppUser::get();
        // dd($appusers);
        return view('ads.form.create', compact('appusers'));
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
        return redirect()->route('ads.index')->with('success', trans('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GetAdsRequest $request, $id)
    {
        $request->id = $id;
        $ads = $request->handle();
        return view('ads.show', compact('ads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appusers = AppUser::get();
        $ads = Ads::with('images')->where('id', $id)->first();
        return view('ads.form.edit', compact('ads', 'appusers'));
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
        return redirect()->route('ads.index')->with('success', trans('site.updated_successfully'));
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
        return redirect()->route('ads.index')->with('error', trans('site.deleted_successfully'));
    }
}
