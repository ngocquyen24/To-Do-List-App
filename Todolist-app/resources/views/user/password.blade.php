@extends('dashboard')


@section('content')
<div class="container">
<div style="width: 480px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class=" text-gray-500 mb-4">Update Your Password:</h1>
        @if(session('msg') !== null)
            <p class="text-green-600 p-2 bg-gray-300 rounded mt-2">{{session('msg')}}</p>
        @endif
       
        @if(session('error') !== null)
            <p class="text-red-600 p-2 bg-gray-300 rounded mt-2">{{session('error')}}</p>
        @endif
        <form action="{{route('user.passwordUpdate')}}" method="POST" class="mt-4">
            @csrf
            <label class="block" for="oldPassword">Current Password: </label>
            <input class="w-full mb-2 rounded-lg bg-gray-200" type="password" name="oldPassword">
            @error('oldPassword')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <label class="block" for="password">New Password: </label>
            <input class="w-full mb-4 rounded-lg bg-gray-200" type="password" name="password">
            @error('password')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <label class="block" for="password_confirmation">Confirm New Password: </label>
            <input class="w-full mb-4 rounded-lg bg-gray-200" type="password" name="password_confirmation">
            @error('password_confirmation')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            <button class="block  py-2 px-4 rounded-lg hover:bg-gray-400 focus:outline-none">Update</button>
        </form>
        <div class="mt-8 text-center">
            <a href="{{route('user.index')}}">
                Back
            </a>
        </div>
    </div>

</div>

@endsection