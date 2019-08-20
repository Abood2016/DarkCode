@extends('back-end.layouts.app')

@section('title')
  Edit Video
@endsection 

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Video'])
@endcomponent 
    
<div class="row">

      <div class="col-md-8">
      
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Video</h4>
                  <p class="card-Video">Edit Video</p>
                </div>

                <div class="card-body">
                <form method="post" action="{{route('videos.update',['id' => $videos->id])}}"  enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                    <div class="row">
                      <div class="col-md-6  {{$errors->has('name') ? 'has-error' : ''}}" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Vidoe Name</label>
                          <input type="text" name ="name" class="form-control" value="{{$videos->name}}">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                       

                 <div class="col-md-6 {{$errors->has('image') ? 'has-error' : ''}}" >
                        <div class="">
                          <label class="">Video image</label>
                          <input type="file" name ="image">
                      <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
                   </div>
                  </div>

                        <div class="col-md-12" {{$errors->has('desc') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea cols="30" rows="5" name ="desc" class="form-control">{{$videos->desc}}</textarea>
                          <span class="text-danger">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</span>
                   </div>
                  </div>

                  <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta Description</label>
                          <textarea  cols="30" rows="2" name ="meta_desc" class="form-control">{{$videos->meta_desc}}</textarea>
                          <span class="text-danger">{{ $errors->has('meta_desc') ? $errors->first('meta_desc') : ''}}</span>
                   </div>
                  </div>
                  <div class="col-md-6 {{$errors->has('name') ? 'has-error' : ''}}" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Meta Keywords</label>
                          <input type="text" name ="meta_keywords" class="form-control" value="{{$videos->meta_keywords}}">
                      <span class="text-danger">{{ $errors->has('meta_keywords') ? $errors->first('meta_keywords') : ''}}</span>
                   </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">YouTupe</label>
                        <input type="url" name="youtupe" class="form-control" value="{{$videos->youtupe}}">
                          <span class="text-danger">{{ $errors->has('youtupe') ? $errors->first('youtupe') : ''}}</span>
               </div>
              </div>
          <div class="col-md-6 " >
              <div class="form-group bmd-form-group">
              <label class="bmd-label-floating">Videos Status</label>
                <select name="published" class="form-control {{$errors->has('published') ? 'has-error' : ''}}">
                 <option value="1" {{isset($videos) && $videos->published == 1 ? 'selected' : ''}}>published</option>
                 <option value="0" {{isset($videos) && $videos->published == 0 ? 'selected' : ''}}>hidden</option>
                          </select>
                          <span class="text-danger">{{ $errors->has('published') ? $errors->first('published') : ''}}</span>
                   </div>
                  </div>
                  
         <div class="col-md-12">
          <div class="form-group bmd-form-group">
             <label class="bmd-label-floating">Category</label>
              <select name="category_id" class="form-control {{$errors->has('category_id') ? 'has-error' : ''}}" >
                 @foreach($categories as $category)
                          <option value="{{$category->id}}" {{isset($videos) && $videos->category_id == $category->id ? 'selected' : ''}} >{{$category->name}}</option>
                           @endforeach
                          </select>
                          <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                   </div>
                  </div>
         <div class="col-md-12">
          <div class="form-group bmd-form-group">
             <label class="bmd-label-floating">Skill</label>
              <select name="skills[]" class="form-control {{$errors->has('skills[]') ? 'has-error' : ''}}" multiple style="height: 100px;" >
                  @foreach($skills as $skill)
                  <option value="{{ $skill->id }}"@foreach($videos->skills as $skillvideo)

                         @if($skillvideo->id == $skill->id)
                                    selected
                           @endif
                          @endforeach>{{ $skill->name }}
                    </option>
                   @endforeach
                          </select>
                          <span class="text-danger">{{ $errors->has('skills[]') ? $errors->first('skills[]') : ''}}</span>
                   </div>
                  </div>
          <div class="col-md-12">
          <div class="form-group bmd-form-group">
             <label class="bmd-label-floating">Tags</label>
              <select name="tags[]" class="form-control {{$errors->has('tags[]') ? 'has-error' : ''}}" multiple style="height: 100px;" >
                  @foreach($tags as $tag)
                  <option value="{{ $tag->id }}"@foreach($videos->tags as $tagvideo)

                         @if($tagvideo->id == $tag->id)
                                    selected
                           @endif
                          @endforeach>{{ $tag->name }}
                    </option>
                   @endforeach
                          </select>
                          <span class="text-danger">{{ $errors->has('tags[]') ? $errors->first('tags[]') : ''}}</span>
                   </div>
                  </div>

                  <button type="submit" class="btn btn-primary pull-right">Update Video</button>
                    <div class="clearfix"></div>
                  </form>
              </div>
            </div>
           </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              @php 
                $url = getYouTupeId($videos->youtupe)
              @endphp
              @if($url)  
              <iframe width="250" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allowfullscreen>
              </iframe>
              @endif
          </div>
        <img src="{{url('admin_uploads/'.$videos->image)}}" width="250">
         
          <div  style="position: relative; top: 400px">
          @include('back-end.comments.create')
          </div>
        </div>
    </div>
          @include('back-end.comments.index')

@endsection
