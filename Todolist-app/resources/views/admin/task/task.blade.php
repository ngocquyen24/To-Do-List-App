@extends('layouts.admin')


@section('content')

<table>
    <tr>
        <th>Task name</th>
        <th>Task details</th>
        <td>Action</td>
    </tr>
    @foreach ($tasks as $task )
        <tr>
            <td>{{$task->task_name}}</td>
            <td>{{$task->task_details}}</td>
            <td>
                <a href="{{route('edit.task',$task->id)}}">Edit</a>
                <form action="{{ route('delete.task', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure you want to delete this task?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
