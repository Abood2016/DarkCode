@extends('back-end.layouts.app')

@section('title')
  Edit Message
@endsection 

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Message'])
@endcomponent 
  
<div class="row">
            <div class="col-md-8">
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Message</h4>
                  <p class="card-category">Edit</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      
                      <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name ="name" class="form-control" value="{{ $messge->name }}">
                        </div>
                      </div>

                      <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name ="email" class="form-control" value="{{ $messge->email }}">
                        </div>
                      </div>

                    <div class="col-md-12" >
                    <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Message</label>
                          <textarea cols="30" rows="5" name ="message" class="form-control">{{$messge->message}}</textarea>
                   </div>
                  </div>

                 </div>
          <hr>
          <h4>Replay on Message</h4>
          <br>
          <form action="{{route('message.replay',['id'=>$messge->id])}}" method="post">
            @csrf
            <div class="col-md-12" >
                    <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Message</label>
                          <textarea cols="30" rows="5" name ="message" class="form-control"></textarea>
                   </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Replay</button>
                  <div class="clearfix"></div>
          </form>        

              </div>
            </div>
           </div>
          </div>
@endsection
