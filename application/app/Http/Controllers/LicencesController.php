<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licence;
use Session;
use Carbon\Carbon;

class LicencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Licencias de Activacion";
        $data = Licence::all();
        $actives = Licence::where('is_active',1)->get();
        return view('admin.licences.browse',compact('title','data','actives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Activar Licencia";

        $actives = Licence::where('is_active',1)->get();
        if($actives->count() == 1){
            return redirect()->route('licences.index');
        }

        return view("admin.licences.activate",compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $actives = Licence::where('is_active',1)->get();
        if($actives->count() == 1){
            return redirect()->route('licences.index');
        }

        $request->validate([
            'code'=>'required|unique:licences'
        ]);

        $licence = new Licence();

        $licence->code = $request->input('code');
        $licence->date_from = Carbon::now();
        $licence->date_to = Carbon::now()->addDays(10);

        if($licence->save()){
            Session::flash('success','Licencia Activada con Exito!!');
        }else{
            Session::flash('error','Error al intentar activar la licencia!!');
        }

        return redirect()->route('licences.index');
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
        //
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
        //
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
