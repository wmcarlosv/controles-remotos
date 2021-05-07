<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Block;
use Session;

class DepartmentsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Departamentos";
        $departments = Department::all();
        return view('admin.departments.browse',['title'=>$title,'data'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Registro de Departamentos";
        $type = 'new';
        $departments = Department::all();
        $blocks = Block::all();
        return view('admin.departments.add_edit',['title'=>$title,'type'=>$type,'blocks'=>$departments, 'blocks'=>$blocks]);
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
            'name'=>'required',
            'block_id'=>'required'
        ]);

        $department = new Department();

        $department->name = $request->input('name');
        $department->block_id = $request->input('block_id');


        if($request->input('is_active')){
            $department->is_active = 1;
        }else{
            $department->is_active = 0;
        }

        if($department->save()){
            Session::flash('success','Registro insertado con exito!!');
        }else{
            Session::flash('error','Error al intentar insertar el registro!!');
        }

        return redirect()->route('departments.index');
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
        $title = "Actualización de Departamentos";
        $type = 'edit';
        $department = Department::findorfail($id);
        $blocks = Block::all();
        return view('admin.departments.add_edit',['title'=>$title,'type'=>$type,'data'=>$department,'blocks'=>$blocks]);
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
            'name'=>'required',
            'block_id'=>'required'
        ]);

        $department = Department::findorfail($id);

        $department->name = $request->input('name');
        $department->block_id = $request->input('block_id');
         if($request->input('is_active')){
            $department->is_active = 1;
        }else{
            $department->is_active = 0;
        }

        if($department->update()){
            Session::flash('success','Registro actualizado con exito!!');
        }else{
            Session::flash('error','Error al intentar actualizar el registro!!');
        }

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findorfail($id);
        if($department->delete()){
            Session::flash('success','Registro eliminado con exito!!');
        }else{
            Session::flash('error','Error al tratar de eliminar el registro!!');
        }

        return redirect()->route('departments.index');
    }
}
