@extends('back-end.layouts.app')

@section('title')
   Categories
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Categories'])
@endcomponent

	<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                	<div class="row">
                    
                		<div class="col-md-8">
                			<h4 class="card-title ">Categories</h4>
                		  <p class="card-category"> List of Categories</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('categories.create')}}" class="btn btn-white btn-round">Add New Category</a>
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
                         Meta Keywords
                        </th>
                        <th>
                         Meta Description
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
                            <td>{{$Category->meta_keywords}}</td>
                        		<td>{{$Category->meta_desc}}</td>
	                        		<td class="td-actions text-right">
                                @include('back-end.categories.Buttons.edit')
	                              @include('back-end.categories.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection