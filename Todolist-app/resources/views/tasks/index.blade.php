@extends('layouts.app')

@section('content')
<a href="{{route('tasks.create')}}" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
                <svg 
                    class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"              stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>New Task</span>
            </a>
@foreach($task as $task)
        {{$task->user_id}}
        <div class="pb-4 pt-2 px-2 mt-4 mb-2 border-b-4 border-gray-400 bg-gray-200 hover:shadow-md rounded">
            <p>{{$task->task_name}}</p>
            <p>{{$task->task_details}}</p>
            
        </div>
        
            
        @endforeach
        <a href="{{route('home')}}">back</a>
@endsection
