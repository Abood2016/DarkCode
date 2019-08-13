<form id="delete-form-{{$messege->id }}" method="post" action="{{route('messeges.destroy',$messege->id)}}" style="display: none">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                         </form>
                                            <a href="" onclick="if(confirm('Are You Sure, you want to delete ?')){
                                                    event.preventDefault();
                                            document.getElementById('delete-form-{{$messege->id }}').submit();
                                                    }
                                            else{
                                                event.preventDefault();
                                            }"><button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button></a>