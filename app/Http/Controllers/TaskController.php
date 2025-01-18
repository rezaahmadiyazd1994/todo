<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function Index()
    {
        $todos = DB::table('todo')->where('do',0)->where('delete',0)->get();
        $do_todos = DB::table('todo')->where('do',1)->where('delete',0)->get();
        return view('index',compact('todos','do_todos'));
    }
    public function Save(Request $request)
    {
        $new_task = $request->input('new-task');
        DB::table('todo')->insert([
            'task' => $new_task
        ]);
        return redirect()->back();
    }
    public function update_task_to_1($id)
    {
        DB::table('todo')->where('id', $id)->update(['do' => 1]);
        return redirect()->back();
    }
    public function update_task_to_0($id)
    {
        DB::table('todo')->where('id', $id)->update(['do' => 0]);
        return redirect()->back();
    }
    public function Delete($id)
    {
        DB::table('todo')->where('id', $id)->update(['delete' => 1]);
        return redirect()->back();
    }

}
