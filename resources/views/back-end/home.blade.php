@extends('back-end.layouts.app')

@section('title')
    home Page
@endsection


@section('content')
     
      @component('back-end.layouts.header',['nav_title' => 'home Page'])

      @endcomponent

@endsection