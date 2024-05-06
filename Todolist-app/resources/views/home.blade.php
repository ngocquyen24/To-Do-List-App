@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <a href="{{route('tasks.index')}}">
                        <div class="bg-gray-200 hover:bg-gray-400 hover:text-gray-200 h-24 md:h-48 flex transition duration-500 ease-in-out transform hover:scale-110">
                            <p class="m-auto">Tasks</p>
                        </div>
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
