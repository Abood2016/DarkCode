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
                            <i class="nc-icon nc-calendar-60"></i> :  {{ $video->created_at->diffForHumans() }}
                        </span>
            		
            			 <span style="margin-right: 20px">
                    @if(empty($video->category->name))
                               Video has No Category
                               @else 
                               <i class="nc-icon nc-single-copy-04"></i> : <a
                                    href="{{ route('front.category' , ['id' => $video->category->id ]) }}">
                        </a>
                            {{ $video->category->name }}
                              @endif
                            
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
          	<div class="row" id="comments">
          		<div class="col-md-12">
         		<div class="card text-left">
					  <div class="card-header card-header-rose">
					  	@php $comments = $video->comments @endphp
					  	<h5>Comments ({{count($comments)}})</h5>
					  </div>
					  <div class="card-body">
					   @foreach($comments as $comment)
             <div class="row">
             <div class="col-md-8">
                 <i class="nc-icon nc-chat-33"></i> 
                 
                 <a href="{{route('front.profile',
                 ['id'=>$comment->user->id ,
                 'slug' => slug($comment->user->name)  ])}}">{{ $comment->user->name }}</a>

               </div>
             <div class="col-md-4 text-right">
                <span> <i class="nc-icon nc-calendar-60"></i> {{ $comment->created_at->diffForHumans() }} |</span>
               
               </div>
               </div>
          			<li>	{{$comment->comment}}</li>
              @if(auth()->user()) 
                     @if((auth()->user()->group == 'admin') || auth()->user()->id == $comment->user->id)
                  <a href="" onclick="$(this).next('div').slideToggle(2000);return false;">Edit</a>
              
              @endif       


                  <div style="display: none;">
                    <form action="{{route('front.comment.update',['id' => $comment->id])}}" method="post">
                      @csrf
                      {{csrf_field()}}
                      <div class="form-group">
                      <textarea name="comment" rows="4" class="form-control">{{$comment->comment}}</textarea>
                        
                      </div>

                      <button type="submit" class="btn">Edit</button>
                    </form>
                  </div>

                  @endif

                    @if(!$loop->last)
                      <hr>
                    @endif
          			@endforeach
					  </div>
					</div>          			
        </div>
      </div>	
        @if(auth()->user())	
          <form action="{{route('front.commentStore',['id' => $video->id])}}" method="post">
                      @csrf
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="comment">Add Comment</label>
                      <textarea name="comment" rows="4" class="form-control"></textarea>
                       <span class="text-danger">{{ $errors->has('comment') ? $errors->first('comment') : ''}}</span>
                      </div>
                      <button type="submit" class="btn">Add Comment</button>
      </form>
      @endif
     </div>

 

  </div>
</div>
@endsection
