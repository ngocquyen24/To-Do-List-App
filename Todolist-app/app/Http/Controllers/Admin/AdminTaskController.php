<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('admin.task.task',compact('tasks'));
    }
    public function edit(Task $task){

        return view('admin.task.edit', compact('task'));

  }
        public function update(Task $task, Request $request){
            $request->validate([
                'task_name' => ['required'],
                'task_details' => ['required'],

            ]);

            $task->update([
                'task_name' => $request->get('task_name'),
                'task_details' => $request->get('task_details'),

            ]);

            // return view('admin.task.task')->with('msg', 'Task updated successfully');
            return redirect('/admin/task/');

        }

        public function delete(Task $task){
            $task->delete();
            return redirect()->back();

        }
}
