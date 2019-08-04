@extends('back-end.layouts.app')

@section('title')
	Create Tag
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Create Tag'])
@endcomponent	
	
<div class="row">
            <div class="col-md-8">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Tag</h4>
                  <p class="card-category">Add New Tag</p>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('tags.store')}}">
               		@csrf
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Tag Name</label>
                          <input type="text" name ="name" class="form-control">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                    
                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Tag</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
@endsection
