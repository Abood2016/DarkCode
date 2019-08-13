 <div class="card" style="width: 20rem;">
            <a href="{{route('frontend.video',['id'=>$video->id])}}" title="{{ $video->name }}"><img class="card-img-top" src="{{url('admin_uploads/'.$video->image)}}" alt="{{ $video->name }}" style="max-height: 250px"></a>  
     <div class="card-body">
                <p class="card-text">
                   <a href="" title="{{ $video->name }}">
                	{{ $video->name }}
                   </a>
                </p>
             <small>{{ $video->created_at }}</small>
     </div>
</div> 
