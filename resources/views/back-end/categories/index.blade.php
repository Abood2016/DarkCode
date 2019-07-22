@extends('back-end.layouts.app')

@section('title')
   Categories
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Categories'])
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
                                </div>
                            </form>
              <div class="card">
                <div class="card-header card-header-primary">

                	<div class="row">
                    
                		<div class="col-md-8">
                			<h4 class="card-title ">Categories</h4>
                		  <p class="card-category"> List of Categories</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('categories.create')}}" class="btn btn-white btn-round">Add New Categories</a>
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
                        <th>
                          Email
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($categories as $Category)
                        	<tr>
                        		<td>{{$Category->id}}</td>
                        		<td>{{$Category->name}}</td>
                        		<td>{{$Category->email}}</td>
	                        		<td class="td-actions text-right">
                                @include('back-end.categories.Buttons.edit')
	                              @include('back-end.categories.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $categories->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection