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
    <td>
        <a href="{{route('edit.user',$user->id)}}">Edit</a>
        <form action="{{ route('delete.user', $user->id) }}" method="POST">
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
