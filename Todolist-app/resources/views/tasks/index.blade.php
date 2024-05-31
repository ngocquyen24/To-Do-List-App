@extends('dashboard')

@section('content')

<div class="container">
    <a href="{{ route('tasks.create') }}" class="btn btn-success">
        <span>+</span>
    </a>



</div>

<!---->


<div class="container m-3 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row mx-1 px-5 pb-3 w-80">
        <div class="col mx-auto">

            <!-- Todo Item 1 -->

            <div class=" px-3 align-items-center todo-item rounded d-flex">
                <div class=" m-1 p-0 align-items-center">
                    <h2 class="m-0 p-0">

                    </h2>
                </div>

                <div class="align-items-center" style="width: 27%">
                <h5 class="m-0 p-0 px-2">

                    Name
                </h5>
                </div>
                <div class="align-items-center " style="width: 25%">
                <h5 class="m-0 p-0 px-2">

                    Detail
                </h5>
                </div>
                <div class=" align-items-center " style="width: 26%">
                <h5 class="m-0 p-0 px-2">

                    Status
                </h5>
                </div>



                <div class="mt-3  todo-actions display:flex">
                    <div class="row d-flex align-items-center justify-content-end">
                        <h5 class="">

                            Action
                        </h5>
                        <h5 class="">


                        </h5>
                    </div>



                </div>
            </div>

            <!-- Todo Item 2 -->

            <!-- Todo Item 3 -->

        </div>
    </div>
    <!-- Create todo section -->

    <div class="p-2 mx-4 border-black-25 border-bottom"></div>
    <!-- View options section -->

    <!-- Todo list section -->
    <div class="row mx-1 px-5 pb-3 w-80">
        <div class="col mx-auto">
        @foreach($tasks as $task)
            <!-- Todo Item 1 -->

            <div class="row px-3 align-items-center todo-item rounded">
                <div class="col-auto m-1 p-0 d-flex align-items-center">
                    <h2 class="m-0 p-0">
                    <form class="" method="POST" action="{{route('mark')}}">
                        @csrf
                        <input class="bg-gray-400 text-green-500" style="width:20px; margin-top: 10px;" type="checkbox" name="id" value="{{$task->id}}" onClick="this.form.submit()" {{$task->task_status ? 'checked' : ''}}>

                        <input type="hidden" name="id" value="{{$task->id}}" />
                    </form>
                    </h2>
                </div>

                <div class="col px-1 m-1 d-flex align-items-center">
                <td>{{ $loop->iteration }}</td>
                    <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-2" readonly value="{{$task->task_name}}" title="{{$task->task_name}}" />
                    <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-2 d-none d-sm-block" value="{{$task->task_details}}" />
                    <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-2 " value="{{$task->status}}" />


                </div>
                <div class="col-auto m-1 p-0 px-3">
                    <div class="row">
                        <div class="col-auto d-flex align-items-center rounded bg-white border border-warning">
                            <i class="fa fa-hourglass-2 my-2 px-2 text-warning  " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Due on date"></i>
                            <h6 class="text my-2 pr-2">{{$task->created_at}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-auto m-1 p-0 todo-actions display:flex">
                    <div class="row d-flex align-items-center justify-content-end">
                        <h5 class="m-0 p-0 px-2">
                            <!-- <i class="fa fa-trash-o text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i> -->
                            <a href="{{ route('tasks.edit', $task->id) }}">
                                 <i class="fa-regular fa-pen-to-square " data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                            </a>

                        </h5>
                        <h5 class="m-0 p-0 px-2">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure you want to delete this task?')" style="border: none">
                            <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                            </button>
                        </form>

                        </h5>
                    </div>


                    <!-- <div class="row todo-created-info">
                        <div class="col-auto d-flex align-items-center pr-2">
                            <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                            <h6 class="date-label my-2 text-black-50">{{$task->created_at}}</h6>
                        </div>
                    </div> -->
                </div>
            </div>
            @endforeach
            <!-- Todo Item 2 -->

            <!-- Todo Item 3 -->


        </div>
    </div>
</div>

@endsection
