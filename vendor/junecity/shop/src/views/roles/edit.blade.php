@extends('junecity::layouts.dashboard')

@section('content')

@if ($errors->any())
@foreach ($errors->all() as $error)

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> {{ $error }}
</div>

@endforeach
@endif

{!! Form::model($role, array('method' => 'put', 'route' => array('update-role', $role->id))) !!}      

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Name: {{ $role->role }}</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example 
      <span class="label label-primary">Label</span>-->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#basic" data-toggle="tab">BASIC</a></li>
        <li><a href="#items" data-toggle="tab">ITEMS</a></li>
       
        
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="basic">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
           

           <div class="form-group">
            {!! Form::label('role', 'Role') !!}
            {!! Form::text('role', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Role', 'value' => 'old(role)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null , array('class' => 'form-control', 'placeholder'=>'description', 'rows'=>3, 'value' => 'old(description)')) !!}
           </div>

        </div>


        <div class="tab-pane" id="items">
            
            <div id="inner-content-div">
            <ul class="list-group">

             
            @foreach($users as $user)

            


            @if ($user->pivot)
          
            <li class="list-group-item">
            <input type="checkbox" name="{{$user->id}}" checked/>
            <a href="#">{{$user->email}}</a>
            </li>

            @else
          
            <li class="list-group-item">
            <input type="checkbox" name="{{$user->id}}"/>
            <a href="#">{{$user->email}}</a>
            </li>
          
            @endif



            @endforeach
           
           </ul>
           </div>
            
        </div>


       
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Update</button>
  </div><!-- box-footer -->
</div><!-- /.box -->

{!! Form::close() !!}


          
@endsection