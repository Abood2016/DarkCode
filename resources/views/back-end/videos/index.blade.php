@extends('back-end.layouts.app')

@section('title')
   videos
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'videos'])
@endcomponent

	<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                	<div class="row">
                    
                		<div class="col-md-8">
                			<h4 class="card-title ">videos</h4>
                		  <p class="card-category"> List of videos</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('videos.create')}}" class="btn btn-white btn-round">Add New Video</a>
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
                         published
                        </th>
                        <th>
                         Category
                        </th>
                        <th>
                         User
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($videos as $video)
                        	<tr>
                        		<td>
                              {{$video->id}}
                            </td>

                            <td>
                              {{$video->name}}
                            </td>

                            <td>
                              @if($video->published == 1)
                                  published

                                  @else

                                  hidden
                              @endif    
                            </td>

                            <td>
                              {{$video->category->name}}
                            </td>

                            <td>
                              {{$video->user->name}}
                            </td>

	                        		<td class="td-actions text-right">
                                @include('back-end.videos.Buttons.edit')
	                              @include('back-end.videos.Buttons.delete')
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