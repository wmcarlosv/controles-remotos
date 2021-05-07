<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use Session;

class BlocksController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Bloques";
        $blocks = Block::all();
        return view('admin.blocks.browse',['title'=>$title,'data'=>$blocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Registro de Bloques";
        $type = 'new';
        $blocks = Block::all();
        return view('admin.blocks.add_edit',['title'=>$title,'type'=>$type,'blocks'=>$blocks]);
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
            'name'=>'required'
        ]);

        $block = new Block();

        $block->name = $request->input('name');
        if($request->input('is_active')){
            $block->is_active = 1;
        }else{
            $block->is_active = 0;
        }

        if($block->save()){
            Session::flash('success','Registro insertado con exito!!');
        }else{
            Session::flash('error','Error al intentar insertar el registro!!');
        }

        return redirect()->route('blocks.index');
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
        $title = "Actualización de Bloques";
        $type = 'edit';
        $block = Block::findorfail($id);
        $blocks = Block::all();
        return view('admin.blocks.add_edit',['title'=>$title,'type'=>$type,'data'=>$block,'blocks'=>$blocks]);
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
            'name'=>'required'
        ]);

        $block = Block::findorfail($id);

        $block->name = $request->input('name');
         if($request->input('is_active')){
            $block->is_active = 1;
        }else{
            $block->is_active = 0;
        }

        if($block->update()){
            Session::flash('success','Registro actualizado con exito!!');
        }else{
            Session::flash('error','Error al intentar actualizar el registro!!');
        }

        return redirect()->route('blocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::findorfail($id);
        if($block->delete()){
            Session::flash('success','Registro eliminado con exito!!');
        }else{
            Session::flash('error','Error al tratar de eliminar el registro!!');
        }

        return redirect()->route('blocks.index');
    }
}
