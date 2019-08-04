@extends('back-end.layouts.app')

@section('title')
	Create User
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Create User'])
@endcomponent	
	
<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create User</h4>
                  <p class="card-category">Add New User</p>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('users.store')}}">
               		@csrf
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name ="name" class="form-control">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                      <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name ="email" class="form-control">
                      <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                 	 </div>
                 	</div>



                 	<div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password"  name ="password" class="form-control">
				                 <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
                 	 </div>
                 	</div>

            <div class="col-md-6 " >
              <div class="form-group bmd-form-group">
              <label class="bmd-label-floating">User Group</label>
                <select name="group" class="form-control {{$errors->has('group') ? 'has-error' : ''}}">
                 <option value="admin" {{isset($users) && $users->group == 'admin' ? 'selected' : ''}}>admin</option>
                 <option value="user" {{isset($users) && $users->group == 'user' ? 'selected' : ''}}>user</option>
                          </select>
                          <span class="text-danger">{{ $errors->has('group') ? $errors->first('group') : ''}}</span>
                   </div>
                  </div>

                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Add User</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
@endsection
