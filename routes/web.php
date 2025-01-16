<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    $todos = DB::table('todo')->where('do',0)->where('delete',0)->get();
    $do_todos = DB::table('todo')->where('do',1)->where('delete',0)->get();
    return view('index',compact('todos','do_todos'));
});
Route::post('/save_task', function(Request $request){
    $new_task = $request->input('new-task');
    DB::table('todo')->insert([
        'task' => $new_task
    ]);
    return redirect()->back();
});
Route::post('/update_task_to_1/{id}', function($id){
    DB::table('todo')->where('id', $id)->update(['do' => 1]);
    return redirect()->back();
});
Route::post('/update_task_to_0/{id}', function($id){
    DB::table('todo')->where('id', $id)->update(['do' => 0]);
    return redirect()->back();
});
Route::post('/delete_task/{id}', function($id){
    DB::table('todo')->where('id', $id)->update(['delete' => 1]);
    return redirect()->back();
});
