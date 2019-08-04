@extends('back-end.layouts.app')

@section('title')
	Edit User
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit User'])
@endcomponent	

<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit User</h4>
                  <p class="card-category">Edit User</p>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('users.update',['id' => $users->id])}}">
               		@csrf
               		{{ method_field('PUT') }}
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name ="name" value="{{ $users->name }}" class="form-control">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                      <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name ="email" value="{{ $users->email }}" class="form-control">
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
                <select name="group" class="form-control {{$errors->has('published') ? 'has-error' : ''}}">
                 <option value="admin" {{isset($users) && $users->group == 'admin' ? 'selected' : ''}}>Admin</option>
                 <option value="user" {{isset($users) && $users->group == 'user' ? 'selected' : ''}}>User</option>
                          </select>
                          <span class="text-danger">{{ $errors->has('group') ? $errors->first('group') : ''}}</span>
                   </div>
                  </div>
                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Update User</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>

@endsection