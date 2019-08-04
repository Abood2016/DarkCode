@extends('back-end.layouts.app')

@section('title')
	Create Skills
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Create Skill'])
@endcomponent	
	
<div class="row">
            <div class="col-md-8">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Skill</h4>
                  <p class="card-category">Add New Skill</p>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('skills.store')}}">
               		@csrf
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Skill Name</label>
                          <input type="text" name ="name" class="form-control">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                    
                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Skill</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
@endsection
