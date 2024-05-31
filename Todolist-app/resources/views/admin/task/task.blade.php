<head>
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@extends('layouts.admin')


@section('content')

<table>
    <tr>
        <th>Task name</th>
        <th>Task details</th>
        <th>Status</th>
        <td>Action</td>
    </tr>
    @foreach ($tasks as $task )
        <tr>
            <td>{{$task->task_name}}</td>
            <td>{{$task->task_details}}</td>
            <td>{{$task->status}}</td>
            <td style="display: flex;">
                <a href="{{route('edit.task',$task->id)}}" class="fa-solid fa-pen-to-square edit"></a>

                <form action="{{ route('delete.task', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete" onclick="return confirm('Are you sure you want to delete this task?')">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
