@extends('layouts.app')

@section('title' , $page->name)

@section('content')
<div class="section section-buttons text-center" style="min-height: 550px">
        <div class="container">
            <div class="title">
                <h1>{{$page->name}}</h1>
            </div>    
           <p>
           	{!! $page->desc !!}
           </p> 	
     </div>
  </div>
@endsection
