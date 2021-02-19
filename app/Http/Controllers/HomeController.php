<?php

namespace App\Http\Controllers;

use App\Models\API\Ads;
use App\Models\API\AppUser;
use App\Models\API\Bids;
use App\Models\API\ReportedPosts;
use App\Models\API\ReportedUser;
use App\Models\API\Stories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = AppUser::get();
        $ads = Ads::get();
        $reportedposts = ReportedPosts::get();
        $reportedusers = ReportedUser::get();
        // $stories = Stories::get();
        // $bids   =   Bids::get();
        return view('home', compact('users', 'ads', 'reportedposts', 'reportedusers'));
    }
}
