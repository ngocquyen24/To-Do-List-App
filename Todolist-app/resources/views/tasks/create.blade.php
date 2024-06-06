@extends('dashboard')


<style>

</style>
@section('content')
<div class="container">
    <div style="width: 480px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">Create a Task</h1>
        <form action="{{route('tasks.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="block" for="task_name">Task Name: </label>
                <input class="w-full mb-2 rounded-lg bg-gray-200 form-control" type="text" name="task_name" value="{{old('task_name')}}">
                @error('task_name')
                    <p class="text-base pb-4 text-red-400">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="block" for="task_details">Task Details: </label>
                <textarea class="w-full mb-2 rounded-lg h-48 bg-gray-200 form-control" type="text" name="task_details">{{old('task_details')}}</textarea>
                @error('task_details')
                    <p class="text-base pb-4 text-red-400">{{$message}}</p>
                @enderror
            </div>
            <input class="w-full mb-2 rounded-lg bg-gray-200" type="text" name="status" value="New" hidden>
            <div class="flex gap-4">
                <button class="btn_add">Create</button>
                <a href="{{route('tasks.index')}}" class="block bg-red-500 py-2 px-4 btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
