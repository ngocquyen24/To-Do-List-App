@extends('layouts.admin')



@section('content')
<div style=""class="task-form max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">Update a Task</h1>
        <form action="{{route('update.user', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="block" for="task_name"> Name: </label>
                <input class="w-full mb-2 rounded-lg h-48 bg-gray-200 form-control" type="text" name="name" value="{{$user->name}}">
                @error('name')
                    <p class="text-base pb-4 text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
         <label class="block" for="task_details">email: </label>
            <input class="w-full mb-2  bg-gray-200 form-control" type="text" name="email" value="{{$user->email}}">
            @error('email')
                <p class="text-base pb-4 text-danger">{{$message}}</p>
            @enderror

         </div>
         <div class="form-group">

            <label class="block" for="task_details">phone: </label>
            <input class="w-full mb-2  bg-gray-200 form-control" type="text" name="phone" value="{{$user->phone}}">
            @error('phone')
                <p class="text-base pb-4 text-danger">{{$message}}</p>
            @enderror


         </div>
         <div class="form-group">
            <label class="block" for="task_details">image: </label>
            <input class="w-full mb-2  bg-gray-200 form-control" type="file" id="imageInput" name="avatar" value="{{$user->avatar}}">

            <img src="{{asset('avatars/'.$user->avatar.'')}}" id="previewImage" alt="" width="300px">

            @error('avatar')
                <p class="text-base pb-4 text-danger">{{$message}}</p>
            @enderror
         </div>


            <div class="form-group">
                <label class="block" for="task_details">Role: </label>
                <select class="w-full mb-2 rounded-lg bg-gray-200 form-control" id="task_status" name="role">

                <option {{ $user->role == '1' ? 'selected' : '' }} value="1">Admin</option>
                <option {{ $user->role == '0' ? 'selected' : '' }} value="0">User</option>
                
            </select>
            </div>

            



            <div class="flex gap-4">
                <button class="block bg-gray-400 py-2 px-4 btn_add">Update</button>
                <a href="{{url('/admin/user/')}}" class="block bg-red-500 py-2 px-4 btn-cancel">Cancel</a>
            </div>
        </form>
    </div>

    <script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.addEventListener('load', function(e) {
            var previewImage = document.getElementById('previewImage');
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
        });

        reader.readAsDataURL(file);
    });

    
</script>
@endsection


