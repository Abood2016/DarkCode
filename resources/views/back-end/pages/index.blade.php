@extends('back-end.layouts.app')

@section('title')
   Pages
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Pages'])
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
                                    <a href="{{ route('pages.index') }}" class="btn btn-primary">Cancel</a>
                              
                                </div>
                            </form>
              <div class="card">
                <div class="card-header card-header-primary">

                	<div class="row">
                    
                		<div class="col-md-8">
                			<h4 class="card-title ">Pages</h4>
                		  <p class="card-category"> List of Pages</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('pages.create')}}" class="btn btn-white btn-round">Add New page</a>
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
                         Description
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
                        @foreach($pages as $page)
                        	<tr>
                        		<td>{{$page->id}}</td>
                            <td>{{$page->name}}</td>
                            <td>{{$page->desc}}</td>
                            <td>{{$page->meta_keywords}}</td>
                        		<td>{{$page->meta_desc}}</td>
	                        		<td class="td-actions text-right">
                                @include('back-end.pages.Buttons.edit')
	                              @include('back-end.pages.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $pages->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection