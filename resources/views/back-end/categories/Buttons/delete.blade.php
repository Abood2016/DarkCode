<!-- <form id="delete-form-{{$Category->id }}" method="post" action="{{route('categories.destroy',$Category->id)}}" style="display: none">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                         </form> -->
                                             {{csrf_field()}}
                                            <a href="javascript:;" id="delete" data-id='{{$Category->id }}' onclick="delete_categoy(this)">
                                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button></a>

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
   
          var token = $("input[name='csrf-token']").attr("content");
            var token = '{!! csrf_token() !!}';
            var tr = $(this).parent().parent();
   
           function delete_categoy(event) {
            var id=$(event).data('id'); 

            swal({
                  title: "Are you sure?",
                  text: "Do you want this Category",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                   
                $.ajax(
                   {
                    url: "/admin/categories/"+id,
                    type: 'POST',
                    data: {
                        "id": id,
                        "_token": token,
                        "_method":'DELETE'
                    },
                     success: function (data){
                             $('#delete').parent().parent().hide();
                         swal("Deleted!", "Category Deleted Succsefully.", "success");
                        $('#delete').parent().parent().hide();
                        }
                });
                    
              }
          });
        }
        
    </script>
@endsection                              