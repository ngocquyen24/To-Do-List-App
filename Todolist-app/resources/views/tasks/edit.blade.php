@extends('dashboard')

@section('content')
<div style="width: 480px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">Update a Task</h1>
        <form action="{{route('tasks.update', $task->id)}}" method="POST">
            @csrf
            @method('PUT')
            <label class="block" for="task_name">Task Name: </label>
            <input class="w-full mb-2 rounded-lg bg-gray-200" type="text" name="task_name" value="{{$task->task_name}}">
            @error('task_name')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <label class="block" for="task_details">Task Details: </label>
            <textarea class="w-full mb-2 rounded-lg h-48 bg-gray-200" type="text" name="task_details">{{$task->task_details}}</textarea>
            @error('task_details')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <select class="w-full mb-2 rounded-lg bg-gray-200" id="task_status" name="status">
                <option {{ $task->status == 'new' ? 'selected' : '' }} value="new">New</option>
                <option {{ $task->status == 'done' ? 'selected' : '' }} value="done">Done</option>
                <option {{ $task->status == 'doing' ? 'selected' : '' }} value="doing">Doing</option>
                <option {{ $task->status == 'canceled' ? 'selected' : '' }} value="canceled">Canceled</option>
            </select>

            
            <div class="flex gap-4">
                <button class="block bg-gray-400 py-2 px-4 rounded-lg text-gray-100 hover:text-gray-500 focus:outline-none">Update</button>
                <a href="{{route('tasks.index')}}" class="block bg-red-500 py-2 px-4 rounded-lg text-gray-100 hover:bg-red-400 focus:outline-none">Cancel</a>
            </div>
        </form>
    </div>
@endsection