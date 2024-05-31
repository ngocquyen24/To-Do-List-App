<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request){

        $user = Auth::id();
        $tasks = DB::table('tasks')->where('user_id', $user)->get();
        $user1 = User::find(auth()->user()->id);
        $admin_role = $request->user()->role;
        $tasks_admin = Task::all();
        return view('tasks.index', ['tasks'=>$tasks,'admin_role'=>$admin_role,'tasks_admin'=>$tasks_admin,'user'=>$user1]);
    }

    public function create(){
        $user = User::find(auth()->user()->id);
        return view('tasks.create',compact('user'));
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
        $user = User::find(auth()->user()->id);
        return view('tasks.edit', ['task'=>$task, 'user'=>$user]);
    }

    public function update(Task $task, Request $request){
        $request->validate([
            'task_name' => ['required'],
            'task_details' => ['required'],
            'status' => ['required'],
        ]);

        $task->update([
            'task_name' => $request->get('task_name'),
            'task_details' => $request->get('task_details'),
            'status' => $request->get('status'),
        ]);

        return redirect('/tasks')->with('msg', 'Task updated successfully');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('/tasks')->with('deleted', 'Task deleted successfully');
    }

    public function markTaskAsCompleted(Request $request){
        $id = $request->get('id');
        $task = Task::findOrFail($id);
        if($task->user_id == Auth::user()->id){
            $task->checkOffTask();
            if($task->task_status === true){
                return redirect()->back()->with('success', 'Task Completed!');
            }else{
                return redirect()->back();
            }
        }
        else{

            return view('tasks.denied');
        }
    }



}
