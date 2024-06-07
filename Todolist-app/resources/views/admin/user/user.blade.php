@extends('layouts.admin')


@section('content')




<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
				<table class="table user-list">
					<thead>
						<tr>
							<th><span>User</span></th>
							<th><span>Phone</span></th>
							
							<th><span>Email</span></th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($users as $user )
                        
						<tr>
							<td>
								<img src="{{asset('avatars/'.$user->avatar.'')}}" alt="">
								<a href="#" class="user-link">{{$user->name}}</a>
                                @if($user->role == 1)
								<span class="user-subhead">Admin</span>
                                @else
                                <span class="user-subhead">User</span>
                                @endif
                            </td>
							</td>
							<td>
								{{$user->phone}}
							</td>
							
							<td>
								<a href="#">{{$user->email}}</a>
							</td>
							<td style="width: 20%;">
								
								<a href="{{route('edit.user',$user->id)}}" class="table-link">
									<span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
									</span>
								</a>
                                <form class="table-link" action="{{ route('delete.user', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  onclick="return confirm('Are you sure you want to delete this task?')">
                                    <span class="fa-stack">
										<i class="fa fa-square fa-stack-2x"></i>
										<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
									</span>
                                    </button>
                                </form>
								
							</td>
						</tr>
                        @endforeach
                    </tbody>
						
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</div>
</div>





















@endsection
