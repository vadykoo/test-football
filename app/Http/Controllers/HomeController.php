<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Gate;
use App\User;

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
        $user = User::find(2);
        \Auth::user()->impersonate($user);
        if (Gate::allows('accessSuperAdmin')) {
            $activities = Activity::all()->reverse();
            }else{
            $activities = [];
        }
        return view('home')->with('activities', $activities);
    }
}
