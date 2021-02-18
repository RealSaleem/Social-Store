<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\GetAllUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\API\AppUser;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllUserRequest $request)
    {
        $appusers = $request->handle();
        // dd($appusers);
        return view('user.index', compact('appusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        $categories = Category::get();
        return view('user.form.create', compact('countries', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $request->handle();
        // dd($request);
        return redirect()->route('user.index')->with('success', trans('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::get();
        $categories = Category::get();
        $appusers = AppUser::where('id', $id)->first();
        return view('user.form.edit', compact('appusers', 'countries', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $request['id'] = $id;
        $request->handle();

        return redirect()->route('user.index')->with('success', trans('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appusers = AppUser::find($id);
        \App\Helpers\Helper::deleteAttachment($appusers->image);
        $appusers->delete();
        return redirect()->route('user.index')->with('error', trans('site.deleted_successfully'));
    }
}
