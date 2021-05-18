<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
use App\Models\Block;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Usuarios";
        $users = User::all();
        return view('admin.users.browse',['title'=>$title,'data'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Registro de Usuario";
        $type = 'new';
        $blocks = Block::all();
        return view('admin.users.add_edit',['title'=>$title,'type'=>$type,'blocks'=>$blocks]);
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
            'email'=>'required|email|unique:users',
            'phone'=>'required',
            'role'=>'required',
            'password'=> 'required'
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->block_id = $request->input('block_id');
        $user->department_id = $request->input('department_id');

        if($user->save()){
            Session::flash('success','Registro insertado con exito!!');
        }else{
            Session::flash('error','Error al intentar insertar el registro!!');
        }

        return redirect()->route('users.index');
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
        $title = "Actualización de Usuario";
        $type = 'edit';
        $user = User::findorfail($id);
        $blocks = Block::all();
        return view('admin.users.add_edit',['title'=>$title,'type'=>$type,'data'=>$user,'blocks'=>$blocks]);
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
            'phone'=>'required',
            'role'=>'required'
        ]);

        $user = User::findorfail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->block_id = $request->input('block_id');
        $user->department_id = $request->input('department_id');

        if($user->update()){
            Session::flash('success','Registro actualizado con exito!!');
        }else{
            Session::flash('error','Error al intentar actualizar el registro!!');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        if($user->delete()){
            Session::flash('success','Registro eliminado con exito!!');
        }else{
            Session::flash('error','Error al tratar de eliminar el registro!!');
        }

        return redirect()->route('users.index');
    }

    public function profile(){
        $title = 'Perfil';

        return view('admin.users.profile',['title' => $title]);
    }

    public function update_profile(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::findorfail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');

        if($user->update()){
            Session::flash('success','Registro actualizado con exito!!');
        }else{
            Session::flash('error','Error al actualizar el registro!!');
        }

        return redirect()->route('dashboard');
    }

    public function change_password(Request $request){
        $request->validate([
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required'
        ]);

        $user = User::findorfail(Auth::user()->id);
        $user->password = bcrypt($request->input('password'));

        if($user->update()){
            Session::flash('success','Registro actualizado con exito!!');
        }else{
            Session::flash('error','Error al actualizar el registro!!');
        }

        return redirect()->route('dashboard');
    }
}
