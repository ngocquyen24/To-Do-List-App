<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = auth()->user()->tasks;
        $task = Task::all();
        
        return view('tasks.index', compact(['tasks', 'task']));
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $request->validate([
            'task_name' => ['required'],
            'task_details' => ['required'],
            'status' => ['required']
        ]);

        Task::create([
            'task_name' => $request->get('task_name'),
            'task_details' => $request->get('task_details'),
            'user_id'=>auth()->user()->id,
            'status' => $request->get('status'),
        ]);

        return redirect('/tasks')->with('msg', 'New task added successfully!');
    }

    public function edit(Task $task){
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, Request $request){
        $request->validate([
            'task_name' => ['required'],
            'task_details' => ['required']
        ]);

        $task->update([
            'task_name' => $request->get('task_name'),
            'task_details' => $request->get('task_details')
        ]);

        return redirect('/tasks')->with('msg', 'Task updated successfully');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('/tasks')->with('deleted', 'Task deleted successfully');
    }

    
}
