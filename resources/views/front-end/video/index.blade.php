@extends('layouts.app')

@section('title' , $video->name)

@section('content')
<div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$video->name}}</h1>
            </div>    

            <div class="row">
             <div class="col-md-12">
           	 @php 
                $url = getYouTupeId($video->youtupe)
              @endphp
              @if($url)  
              <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allowfullscreen>
              </iframe>
              @endif
            
            	</div>
          	 </div>

          	<div class="row">
            	<div class="col-md-6">
            		<p>
            	    <span style="margin-right: 20px">
            		    <i class="nc-icon nc-user-run"></i> : {{ $video->user->name }}
            		</span>
            		
            			<span style="margin-right: 20px">
                            <i class="nc-icon nc-calendar-60"></i> :  {{ $video->created_at }}
                        </span>
            		
            			 <span style="margin-right: 20px">
                            <i class="nc-icon nc-single-copy-04"></i> : <a
                                    href="{{ route('front.category' , ['id' => $video->category->id ]) }}">
                            {{ $video->category->name }}
                        </a>
                        </span>
            		</p>
	
            		<p>
                        {{ $video->desc }}
                    </p>

            		<div class="col-md-3">
                    <h6>Tags</h6>
                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{ route('front.tags' , ['id' => $tag->id]) }}">
                                <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            		<div class="col-md-3">
                    <h6>Skills</h6>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{ route('front.skill' , ['id' => $skill->id]) }}">
                                <span class="badge badge-pill badge-danger">{{ $skill->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
          	<div class="row">
          		<div class="col-md-12">
         		<div class="card text-left">
					  <div class="card-header card-header-rose">
					  	@php $comments = $video->comments @endphp
					  	<h5>Comments ({{count($comments)}})</h5>
					  </div>
					  <div class="card-body">
					   @foreach($comments as $comment)
          				{{$comment->comment}}<hr>
          			@endforeach
					  </div>
					</div>

          			
          		</div>
          </div>		
     </div>
  </div>
</div>
@endsection
