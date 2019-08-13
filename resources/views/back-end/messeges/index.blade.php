@extends('back-end.layouts.app')

@section('title')
   Messeges
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Messeges'])
@endcomponent

	<div class="row">
		       <div class="col-md-12">
           
              <div class="card">
                <div class="card-header card-header-primary">

                	<div class="row">
                    
                		<div class="col-md-8">
                			<h4 class="card-title ">Messeges</h4>
                		  <p class="card-category">List of Messeges</p>
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
                         <th>
                          Messege
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($messges as $messege)
                        	<tr>
                        		<td>{{$messege->id}}</td>
                            <td>{{$messege->name}}</td>
                            <td>{{$messege->email}}</td>
                            <td>{{$messege->message}}</td>
	                        		<td class="td-actions text-right">
                                @include('back-end.messeges.Buttons.edit')
	                              @include('back-end.messeges.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $messges->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection