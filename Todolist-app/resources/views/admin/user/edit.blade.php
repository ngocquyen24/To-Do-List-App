<head>
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
</head>
@extends('layouts.admin')

@section('content')
<div style="width: 480px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">Update a Task</h1>
        <form class="form-edit" action="{{route('update.user', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label class="block" for="task_name"> Name: </label>
            <input class="w-full mb-2 bg-gray-200" type="text" name="name" value="{{$user->name}}">
            @error('name')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <label class="block" for="task_details">email: </label>
            <input class="w-full mb-2  bg-gray-200" type="text" name="email" value="{{$user->email}}">
            @error('email')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <label class="block" for="task_details">phone: </label>
            <input class="w-full mb-2  bg-gray-200" type="text" name="phone" value="{{$user->phone}}">
            @error('phone')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <label class="block" for="task_details">image: </label>
            <img src="{{asset('avatars/'.$user->avatar.'')}}" alt="">
            <input class="w-full mb-2  bg-gray-200" type="file" name="avatar">
            @error('avatar')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror

            <label class="block" for="task_name"> Role: </label>
            <input class="w-full mb-2 bg-gray-200" type="text" name="role" value="{{$user->role}}">
            @error('role')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror




            <div class="flex gap-4">
                <button class="block bg-gray-400 py-2 px-4 rounded-lg text-gray-100 hover:text-gray-500 focus:outline-none">Update</button>
                <a href="{{route('list.user')}}" class="cancel block bg-red-500 py-2 px-4 rounded-lg text-gray-100 hover:bg-red-400 focus:outline-none">Cancel</a>
            </div>
        </form>
    </div>
@endsection
