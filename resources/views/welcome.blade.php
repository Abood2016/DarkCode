@extends('layouts.app')

@section('title' , 'Home')

@section('content')
<div class="page-header section-dark" style="background-image: url('/img/antoine-barres.jpg')">
    <div class="filter"></div>
    <div class="content-center">
      <div class="container">
        <div class="title-brand">
          <h1 class="presentation-title">DarkCode</h1>
          <div class="fog-low">
            <img src="/frontEnd/img/fog-low.png" alt="">
          </div>
          <div class="fog-low right">
            <img src="/frontEnd/img/fog-low.png" alt="">
          </div>
        </div>
        <h2 class="presentation-subtitle text-center">Web Site Programming</h2>
      </div>
    </div>
    <div class="moving-clouds" style="background-image: url('/frontEnd/img/clouds.png'); "></div>
  </div>
@endsection