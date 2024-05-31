@extends('dashboard')

@section('content')
    <div class="container">



<!--
bat dau tu day  -->

<div class="profile-page">
<div class="page-header header-filter" data-parallax="true" style="background-image:url('https://png.pngtree.com/thumb_back/fw800/background/20240210/pngtree-wallpaper-to-do-list-reminder-of-thesis-vector-image_15625027.jpg');"></div>

    <div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="{{asset('avatars/'.$user->avatar.'')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{$user->name}}</h3>
								<h6>{{$user->email}}</h6>
								<a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
	                        </div>
	                    </div>
    	            </div>
                </div>
                <div class="description text-center">
                    <p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                </div>
				<div class="row">
					<div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                          <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">

                                  <i class="fa-solid fa-user-pen"></i>
                                   update
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                <i class="fa-solid fa-unlock-keyhole"></i>
                                    update password
                                </a>
                            </li>
                          </ul>
                        </div>
    	    	</div>
            </div>

          <div class="tab-content tab-space">

            <div class="tab-pane gallery " id="works">
      			<div class="" style="width: 50%; margin: 0 auto">
      				<div class="ml-auto">
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




      			</div>
  			</div>
            <div class="tab-pane gallery" id="favorite">
      			<div class="" style="width: 50%; margin: 0 auto">
      				<div class="ml-auto ">
                      <form action="{{route('user.passwordUpdate')}}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
            <label class="block" for="oldPassword">Current Password: </label>
            <input class="w-full mb-2 rounded-lg bg-gray-200 form-control" type="password" name="oldPassword">
            @error('oldPassword')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group">
            <label class="block" for="password">New Password: </label>
            <input class="w-full mb-4 rounded-lg bg-gray-200 form-control" type="password" name="password">
            @error('password')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group">
            <label class="block" for="password_confirmation">Confirm New Password: </label>
            <input class="w-full mb-4 rounded-lg bg-gray-200 form-control" type="password" name="password_confirmation">
            @error('password_confirmation')
                <p class="text-base pb-4 text-red-400">{{$message}}</p>
            @enderror
            </div>


            <div class="flex gap-4 mt-3">
                <button class="btn_add">Update</button>
                <a href="{{route('user.index')}}" class="block bg-red-500 py-2 px-4 btn-cancel">Cancel</a>
            </div>
        </form>
      				</div>

      			</div>
      		</div>
          </div>


            </div>
        </div>
	</div>

	<footer class="footer text-center ">
        <p>Made with <a href="https://demos.creative-tim.com/material-kit/index.html" target="_blank">Material Kit</a> by Creative Tim</p>
    </footer>


</div>
<a class="btn-back"href="{{route('tasks.index')}}"> back</a>
    </div>
    </div>

    @endsection
