<form action="{{route('users.destroy' , ['id' => $user->id ])}}" method="post">
                              {{method_field('delete')}}
                              @csrf 
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove User">
                                  <i class="material-icons">close</i>
                                    </button>
                                </form>