@extends('back-end.layouts.app')

@section('title')
    home Page
@endsection


@section('content')
     
      @component('back-end.layouts.header',['nav_title' => 'home Page'])

      @endcomponent

    @include('back-end.home-sections.statices')
    
    @include('back-end.home-sections.letestComment')




@endsection