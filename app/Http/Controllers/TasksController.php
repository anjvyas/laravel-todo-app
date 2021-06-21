<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Task;

class TasksController extends Controller
{
    public function show()
    {
        $tasks = DB::table('tasks')->get();
        return view('todos', compact('tasks'));
    } 

    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->updated_at = now();
        $task->created_at = now();
        $task->done = false;
        $task->save();

        $tasks = Task::all();
        return redirect('/todos');
    } 

    public function done($id)
    {
        $affected_task = DB::table('tasks')->where('id', $id)->update(['done' => true]);
        return redirect('/todos');
    }

    public function pending($id)
    {
        $affected_task = DB::table('tasks')->where('id', $id)->update(['done' => false]);
        return redirect('/todos');
    }

    public function delete($id)
    {
        $affected_task = DB::table('tasks')->where('id', $id)->delete();
        return redirect('/todos');
    }

    public function edit($id)
    {
        $name = DB::table('tasks')->where('id', $id)->select('name')->get();
        return view('edit', ["id"=>$id, "prev_name"=>$name]);
    }

    public function update(Request $request, $id)
    {
        $affected_task = DB::table('tasks')->where('id', $id)->update(['name' => $request->input('name')]);
        return redirect('/todos');
    }
}

