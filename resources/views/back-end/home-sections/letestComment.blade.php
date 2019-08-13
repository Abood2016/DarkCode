<div class="row">
            <div class="col-lg">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Comments</h4>
                  <p class="card-category">Letest Comments</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>ID</th>
                      <th>Name</th>
                      <th>Video</th>
                      <th>Comment</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr></thead>
                    <tbody>
                      @foreach($comments as $comment)
                      <tr>
                        <td>{{$comment->id}}</td>
                        <td>
                          <a href="{{route('users.edit',['id'=> $comment->user->id])}}">{{$comment->user->name}}
                          </a>
                        </td>
                        <td>
                        @if(empty($comment->video->name))
                          <span class="text-warning">The Video deleted</span>
                        @else
                           <a href="{{ route('videos.edit' , ['id' => $comment->video->id]) }}">

                         {{ $comment->video->name }}
                        @endif  
                    
                          </a>
                        </td>
                        <td>{{$comment->comment}}</td>
                        
                        <td>{{$comment->created_at}}</td>
                        
                        <td>
                          <form id="delete-form-{{$comment->id }}" method="post" action="{{route('comment.destroy',['id'=> $comment->id])}}" style="display: none">
                                             {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                         </form>
                                            <a href="" onclick="if(confirm('Are You Sure, you want to delete ?')){
                                                    event.preventDefault();
                                            document.getElementById('delete-form-{{$comment->id }}').submit();
                                                    }
                                            else{
                                                event.preventDefault();
                                            }"><button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Comment">
                                <i class="material-icons">close</i>
                              </button></a>
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {!! $comments->links() !!}
                </div>
              </div>
            </div>
           
          </div>