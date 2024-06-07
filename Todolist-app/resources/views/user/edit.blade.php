@extends('dashboard')

@section('content')
<div style="width: 480px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">

        <h1 class="text-xl uppercase text-gray-500 mb-4">Update profile</h1>
        <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label class="block" for="task_name"> Name: </label>
            <input class="w-full mb-2 bg-gray-200 form-control" type="text" name="name" value="{{$user->name}}">
            @error('name')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
         </div>

         <div class="form-group">
         <label class="block" for="task_details">email: </label>
            <input class="w-full mb-2  bg-gray-200 form-control" type="text" name="email" value="{{$user->email}}">
            @error('email')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror

         </div>
         <div class="form-group">

            <label class="block" for="task_details">phone: </label>
            <input class="w-full mb-2  bg-gray-200 form-control" type="text" name="phone" value="{{$user->phone}}">
            @error('phone')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror


         </div>
         <div class="form-group">


            <label class="block" for="task_details">image: </label>
            <input class="w-full mb-2  bg-gray-200 form-control" type="file" name="avatar">

            <img src="{{asset('avatars/'.$user->avatar.'')}}" alt="" width="300px">


            @error('avatar')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror



         </div>






            <div class="flex gap-4 mt-3">
                <button class="btn_add">Update</button>
                <a href="{{route('user.index')}}" class="block bg-red-500 py-2 px-4 btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection

