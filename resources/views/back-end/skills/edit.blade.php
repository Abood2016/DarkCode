@extends('back-end.layouts.app')

@section('title')
	Edit Skills
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Skill'])
@endcomponent	
	
<div class="row">
            <div class="col-md-8">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Skill</h4>
                  <p class="card-category">Edit</p>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('skills.update',['id'=>$skills->id])}}">
               		@csrf
                  {{method_field('PUT')}}
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Skill Name</label>
                          <input type="text" name ="name" class="form-control" value="{{ $skills->name }}">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                  
                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Skill</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
@endsection
