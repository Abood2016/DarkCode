@extends('back-end.layouts.app')

@section('title')
   Users
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Users'])
@endcomponent

	<div class="row">
		       <div class="col-md-12">
                            <form action="" method="GET">
                                <div class="col-sm-4 form-group">
                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                           value="{{app('request')->get('name')}}">
                                </div>
                                <div class="col-sm-12 form-action ">
                                    <input type="submit" value="Search" class="btn btn-primary" >
                                </div>
                                <div class="col-sm-12 form-action ">
                              <a href="{{ route('users.index') }}" class="btn btn-primary"><i>Cancel</i></a>
                                </div>
                            </form>
              <div class="card">
                <div class="card-header card-header-primary">

                	<div class="row">
                    
                		<div class="col-md-8">
                			<h4 class="card-title ">Users</h4>
                		  <p class="card-category"> List of Users</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('users.create')}}" class="btn btn-white btn-round">Add New User</a>
                		</div>
                	</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        	<tr>
                        		<td>{{$user->id}}</td>
                        		<td>{{$user->name}}</td>
                        		<td>{{$user->email}}</td>
	                        		<td class="td-actions text-right">
                                @include('back-end.users.Buttons.edit')
	                              @include('back-end.users.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $users->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection


@section('script')

  

@endsection