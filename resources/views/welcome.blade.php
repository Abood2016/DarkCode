@extends('layouts.app')

  @section('title' , 'Home')

@section('content')

  @include('front-end.home-page-sections.home-image')

  @include('front-end.home-page-sections.videos')

  @include('front-end.home-page-sections.static')

  @include('front-end.home-page-sections.contact-us')


@endsection