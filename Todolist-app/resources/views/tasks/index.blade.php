@extends('dashboard')

@section('content')
    <a href="{{route('tasks.create')}}" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
        <span>New Task</span>
    </a>

    <table>
        <tr>
            <th>Task name</th>
            <th>Task description</th>
            <th>Task status</th>
            <th>action</th>
        </tr>
        
    @foreach($task as $task)
    {{$task->user_id}}
        <tr>
            <td>{{$task->task_name}}</td>
            <td>{{$task->task_details}}</td>
            <td>{{$task->status}}</td>
            <td>
            <a href="{{route('tasks.edit', $task->id)}}" class="hover:text-gray-400">edit</a>
        </tr>
        
    </table>
        
    @endforeach
    <a href="{{route('home')}}">back</a>
@endsection
