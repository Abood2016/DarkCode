@extends('back-end.layouts.app')

@section('title')
   Tags
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Tags'])
@endcomponent

	<div class="row">
		       <div class="col-md-12">
           
            <form action="" method="GET">
                                <div class="col-sm-4 form-group">
                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                           value="{{app('request')->get('name')}}">
                                </div>
                                <div class="col-sm-12 form-action ">
                                    <input type="submit" value="Search" class="btn btn-primary" >
                                    <a href="{{ route('tags.index') }}" class="btn btn-primary">Cancel</a>
                                </div>
                                </form>
              <div class="card">
                <div class="card-header card-header-primary">

                	<div class="row">
                    
                		<div class="col-md-8">
                			<h4 class="card-title ">Tags</h4>
                		  <p class="card-category"> List of Tags</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('tags.create')}}" class="btn btn-white btn-round">Add New Tag</a>
                		</div>
                	</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>
                          Name
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($tags as $tag)
                        	<tr>
                        		<td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
	                        		<td class="td-actions text-right">
                                @include('back-end.tags.Buttons.edit')
	                              @include('back-end.tags.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $tags->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection