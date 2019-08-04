<form id="delete-form-{{$video->id }}" method="post" action="{{route('videos.destroy',$video->id)}}" style="display: none">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                         </form>
                                            <a href="" onclick="if(confirm('Are You Sure, you want to delete ?')){
                                                    event.preventDefault();
                                            document.getElementById('delete-form-{{$video->id }}').submit();
                                                    }
                                            else{
                                                event.preventDefault();
                                            }"><button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button></a>