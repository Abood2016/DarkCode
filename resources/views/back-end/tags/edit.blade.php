@extends('back-end.layouts.app')

@section('title')
	Edit Tag
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Tag'])
@endcomponent	
	
<div class="row">
            <div class="col-md-8">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Tag</h4>
                  <p class="card-category">Edit</p>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('tags.update',['id'=>$tags->id])}}">
               		@csrf
                  {{method_field('PUT')}}
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Tag Name</label>
                          <input type="text" name ="name" class="form-control" value="{{ $tags->name }}">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                  
                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Tag</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
@endsection
