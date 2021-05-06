<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

Route::get('/get-childrens/{table}/{column_parent_id}/{id}', function($table=null,$column_parent_id=null,$id=null){
	$childrens = getChildrens($table,$column_parent_id, $id);
	return $childrens;
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
	Route::resources([
		'users' => \App\Http\Controllers\UsersController::class,
		'blocks' => \App\Http\Controllers\BlocksController::class,
		'departments' => \App\Http\Controllers\DepartmentsController::class,
		'controls' => \App\Http\Controllers\ControlsController::class,
		'activities' => \App\Http\Controllers\ActivitiesController::class
	]);
	Route::get('/profile',[\App\Http\Controllers\UsersController::class, 'profile'])->name('profile');
	Route::put('/update_profile',[\App\Http\Controllers\UsersController::class,'update_profile'])->name('update_profile');
	Route::put('/change_password',[\App\Http\Controllers\UsersController::class,'change_password'])->name('change_password');
});