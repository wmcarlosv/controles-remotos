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

    public function possible_cloning(){
        $title = "Posible Clonacion";
        $data = DB::select(DB::raw("select 
                                        b.name as block,
                                        d.name as department,
                                        a.number_c,
                                        a.button,
                                        date_format(a.created_at, '%d-%m-%Y') as date,
                                        count(a.number_c) as qty,
                                        b.max_num 
                                    from activities a 
                                        inner join blocks b on b.id = a.block_id 
                                        inner join departments d on d.id = a.department_id
                                    group by a.number_c, date, block, department, a.number_c, a.button, b.max_num
                                    having qty >= b.max_num "));

        return view('admin.possible_cloning',compact('title','data'));
    }
}
