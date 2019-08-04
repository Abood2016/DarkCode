@extends('back-end.layouts.app')

@section('title')
	Create Page
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Create Page'])
@endcomponent	
	
<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Page</h4>
                  <p class="card-Page">Add New Page</p>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('pages.store')}}">
               		@csrf
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Page Name</label>
                          <input type="text" name ="name" class="form-control">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                       <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta Keywords</label>
                          <input type="text" name ="meta_keywords" class="form-control">
                      <span class="text-danger">{{ $errors->has('meta_keywords') ? $errors->first('meta_keywords') : ''}}</span>
                   </div>
                  </div>

                        <div class="col-md-12" {{$errors->has('desc') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea   cols="30" rows="10" name ="desc" class="form-control">
                          </textarea>
                          <span class="text-danger">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</span>
                   </div>
                  </div>

                 	<div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta Description</label>
                          <textarea   cols="30" rows="5" name ="meta_desc" class="form-control">
                            
                          </textarea>
				                  <span class="text-danger">{{ $errors->has('meta_desc') ? $errors->first('meta_desc') : ''}}</span>
                 	 </div>
                 	</div>
                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Page</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
@endsection
