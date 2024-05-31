@extends('dashboard')

@section('content')

<div class="container">
    <a href="{{ route('tasks.create') }}" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
        <span>New Task</span>
    </a>
    <table>
        <tr>
            <th>#</th>
            <th>Check</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
       
        @if($admin_role == 1)
            @foreach($tasks_admin as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td> 
                    <form class="flex items-center gap-2" method="POST" action="{{route('mark')}}">
                        @csrf  
                        <input class="bg-gray-400 text-green-500" type="checkbox" name="id" value="{{$task->id}}" onClick="this.form.submit()" {{$task->task_status ? 'checked' : ''}}>
                        
                        <input type="hidden" name="id" value="{{$task->id}}" />
                    </form>
                    </td>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->task_details }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="hover:text-gray-400">edit</a>
                    </td>
                </tr>
            @endforeach
        @else
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td> 
                    <form class="flex items-center gap-2" method="POST" action="{{route('mark')}}">
                        @csrf  
                        <input class="bg-gray-400 text-green-500" type="checkbox" name="id" value="{{$task->id}}" onClick="this.form.submit()" {{$task->task_status ? 'checked' : ''}}>
                        
                        <input type="hidden" name="id" value="{{$task->id}}" />
                    </form>
                    </td>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->task_details }}</td>
                    <td>{{ $task->status }}</td>
                    <td class='d-flex ps-1 pe-1'>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="hover:text-gray-400 ms-2 me-2">edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure you want to delete this task?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    <a href="{{ route('home') }}">back</a>
    <a href="{{route('user.index')}}">profile</a>
</div>

@endsection
