@extends('dashboard')

@section('content')
<div class="container">
    <h1 class="fs-2" >This is not your task, you are not allowed to do this</h1>
    <div class="flex">
    <p>You will be redirected in&ensp;<div id="counter">5</div>&ensp;seconds</p> 
        
    </div>
    
</div>

    <script>
        setInterval(function() {
            var div = document.querySelector("#counter");
            var count = div.textContent * 1 - 1;
            div.textContent = count;
            if (count <= 0) {
                window.location.replace("http://127.0.0.1:8000/tasks");
            }
        }, 1000);
    </script>
@endsection
