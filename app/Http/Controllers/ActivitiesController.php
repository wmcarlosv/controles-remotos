<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Session;

class ActivitiesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Actividades";
        $date_from = '';
        $date_to = '';
        
        if( (isset($_GET['date_from']) and isset($_GET['date_to'])) and (!empty($_GET['date_from']) and !empty($_GET['date_to']))  ){
            $date_from = $_GET['date_from'];
            $date_to = $_GET['date_to'];
            $activities = Activity::where([
                ['created_at','>=',$date_from],
                ['created_at','<=',$date_to]
            ])->get();
        }else{
            $activities = Activity::all();
        }
        
        
        return view('admin.activities.browse',['title'=>$title,'data'=>$activities, 'date_from'=>$date_from, 'date_to'=>$date_to]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findorfail($id);

        if($activity->delete()){
            Session::flash('success','Actividad eliminada con Exito!!');
        }else{
            Session::flash('error','Error al intentar eliminar la Actividad!!');
        }

        return redirect()->route('activities.index');
    }
}
