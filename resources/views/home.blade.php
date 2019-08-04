@extends('layouts.app')

@section('title' , 'Videos')

@section('content')
<div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>Latest videos</h2>
            </div>    
        @include('front-end.shared.video-row')
     </div>
  </div>
@endsection
