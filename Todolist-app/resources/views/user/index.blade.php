@extends('dashboard')

@section('content')
    <div class="container">
    <table >
            <thead>
                <tr class="">
                    <th class="px-2 py-2">Name</th>
                    <th class="px-2 py-2">Email</th>
                    <th class="px-2 py-2">Image</th>
                    <th class="px-2 py-2">Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-gray-200 hover:bg-gray-100">
                    <td class="px-2 py-4">{{$user->name}}</td>
                    <td class="px-2 py-4">{{$user->email}}</td>
                    <td class="px-2 py-4"><img class="img-fluid" style="height: 50px;" src="{{asset('avatars/'.$user->avatar.'')}}" alt=""></td>
                    <td class="px-2 py-4">{{$user->phone}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <div>
                <a href="{{route('user.edit',$user->id)}}" class="">
                    
                    <span>Update Account Info</span>
                </a>
            </div>
            <div>
                <a href="{{route('user.password')}}" class="">
                    
                    <span>Update Your Password</span>
                </a>
            </div>
        </div>
        <div class=" text-center">
            <a href="{{route('dashboard')}}">
                
            </a>
        </div>
        <a href="{{route('tasks.index')}}"> back</a>
    </div>
    </div>
        
    @endsection