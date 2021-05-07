<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Control;
use App\Models\Block;
use App\Models\Department;
use Session;

class ControlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Controles";
        $controls = Control::all();
        return view('admin.controls.browse',['title'=>$title,'data'=>$controls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Registro de Controles";
        $type = 'new';
        $controls = Control::all();
        $controls = Block::all();
        return view('admin.controls.add_edit',['title'=>$title,'type'=>$type,'blocks'=>$controls]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'block_id'=>'required',
            'department_id'=>'required',
            'code_a'=>'required',
            'code_b'=>'required',
            'code_c'=>'required',
            'code_d'=>'required',
            'number_c'=>'required'
        ]);

        $control = new Control();

        $control->block_id = $request->input('block_id');
        $control->department_id = $request->input('department_id');

        $control->code_a = $request->input('code_a');
        if($request->input('status_a')){
            $control->status_a = 1;
        }else{
            $control->status_a = 0;
        }

        $control->code_b = $request->input('code_b');
        if($request->input('status_b')){
            $control->status_b = 1;
        }else{
            $control->status_b = 0;
        }

        $control->code_c = $request->input('code_c');
        if($request->input('status_c')){
            $control->status_c = 1;
        }else{
            $control->status_c = 0;
        }

        $control->code_d = $request->input('code_d');
        if($request->input('status_d')){
            $control->status_d = 1;
        }else{
            $control->status_d = 0;
        }

        $control->number_c = $request->input('number_c');

        $control->is_active = $request->input('is_active');
        if($request->input('is_active')){
            $control->is_active = 1;
        }else{
            $control->is_active = 0;
        }

        $control->is_deactive = $request->input('is_deactive');
        if($request->input('is_deactive')){
            $control->is_deactive = 1;
        }else{
            $control->is_deactive = 0;
        }

        if($control->save()){
            Session::flash('success','Registro insertado con exito!!');
        }else{
            Session::flash('error','Error al intentar insertar el registro!!');
        }

        return redirect()->route('dashboard');
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
        $title = "Actualización de Controles";
        $type = 'edit';
        $control = Control::findorfail($id);
        $blocks = Block::all();
        $departments = Block::findorfail($control->block_id)->departments;
        
        return view('admin.controls.add_edit',['title'=>$title,'type'=>$type,'data'=>$control,'blocks'=>$blocks, 'departments'=>$departments]);
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
        $request->validate([
            'block_id'=>'required',
            'department_id'=>'required',
            'code_a'=>'required',
            'code_b'=>'required',
            'code_c'=>'required',
            'code_d'=>'required',
            'number_c'=>'required'
        ]);

        $control = Control::findorfail($id);

        $control->block_id = $request->input('block_id');
        $control->department_id = $request->input('department_id');

        $control->code_a = $request->input('code_a');
        if($request->input('status_a')){
            $control->status_a = 1;
        }else{
            $control->status_a = 0;
        }

        $control->code_b = $request->input('code_b');
        if($request->input('status_b')){
            $control->status_b = 1;
        }else{
            $control->status_b = 0;
        }

        $control->code_c = $request->input('code_c');
        if($request->input('status_c')){
            $control->status_c = 1;
        }else{
            $control->status_c = 0;
        }

        $control->code_d = $request->input('code_d');
        if($request->input('status_d')){
            $control->status_d = 1;
        }else{
            $control->status_d = 0;
        }

        $control->number_c = $request->input('number_c');

        $control->is_active = $request->input('is_active');
        if($request->input('is_active')){
            $control->is_active = 1;
        }else{
            $control->is_active = 0;
        }

        $control->is_deactive = $request->input('is_deactive');
        if($request->input('is_deactive')){
            $control->is_deactive = 1;
        }else{
            $control->is_deactive = 0;
        }

        if($control->update()){
            Session::flash('success','Registro actualizado con exito!!');
        }else{
            Session::flash('error','Error al intentar actualizar el registro!!');
        }

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $control = Control::findorfail($id);
        if($control->delete()){
            Session::flash('success','Registro eliminado con exito!!');
        }else{
            Session::flash('error','Error al tratar de eliminar el registro!!');
        }

        return redirect()->route('dashboard');
    }
}
