<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activities = Activity::all();
        $controls = DB::select(DB::raw("select count(id) as qty, date_format(created_at, '%m/%Y') as month from controls group by date_format(created_at, '%m/%Y')"));
        $listActivities = DB::select(DB::raw("select count(id) as qty, date_format(created_at,'%m/%Y') as month from activities GROUP by date_format(created_at,'%m/%Y')"));

        return view('admin.dashboard',['data'=>$activities, 'controls'=>$controls,'listActivities'=>$listActivities]);
    }
}
