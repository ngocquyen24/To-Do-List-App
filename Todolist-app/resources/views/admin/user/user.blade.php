<head>
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@extends('layouts.admin')

@section('content')
<table>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Avatar</th>
    <th>Phone</th>
    <th>Role</th>
    <th>Action</th>
</tr>

@foreach ($users as $user )
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->avatar}}</td>
    <td>{{$user->phone}}</td>
    <td>{{$user->role}}</td>
    <td style="display: flex;" >
        <a href="{{route('edit.user',$user->id)}}"><i class="fa-solid fa-pen-to-square edit"></i></a>
        <form action="{{ route('delete.user', $user->id) }}" method="POST">
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
