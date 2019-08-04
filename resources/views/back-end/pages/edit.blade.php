@extends('back-end.layouts.app')

@section('title')
	Edit Page
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Page'])
@endcomponent	
	
<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Page</h4>
                </div>
                <div class="card-body">
               	<form method="post" action="{{route('pages.update',['id' => $pages->id])}}">
                  {{ method_field('PUT') }}
               		@csrf
                    <div class="row">
                     <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Page Name</label>
                          <input type="text" name ="name" class="form-control" value="{{$pages->name}}">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                       <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta Keywords</label>
                          <input type="text" name ="meta_keywords" class="form-control" value="{{$pages->meta_keywords}}">
                      <span class="text-danger">{{ $errors->has('meta_keywords') ? $errors->first('meta_keywords') : ''}}</span>
                   </div>
                  </div>

                      </div>
                        <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea   cols="30" rows="10" name ="desc" class="form-control">
                            {{$pages->desc}}
                          </textarea>
                          <span class="text-danger">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</span>
                   </div>
                  </div>
                      
                 	<div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta Description</label>
                          <textarea   cols="30" rows="5" name ="meta_desc" class="form-control">
                            {{$pages->meta_desc}}
                          </textarea>
				                  <span class="text-danger">{{ $errors->has('meta_desc') ? $errors->first('meta_desc') : ''}}</span>
                 	 </div>
                 </div>
                    <button type="submit" class="btn btn-primary pull-right">Edit Page</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
@endsection
