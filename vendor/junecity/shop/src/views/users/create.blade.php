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


{!! Form::open(['role'=>'form',  'route'=>'store-user']) !!} 

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">New User</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example 
      <span class="label label-primary">Label</span>-->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#info" data-toggle="tab">INFO</a></li>
        <li><a href="#advance" data-toggle="tab">ADVANCE</a></li>
        
        
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="info">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
           <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Email', 'value' => 'old(email)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Name', 'value' => 'old(name)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            <input type="password" class="form-control" placeholder="Password" name="password">
            
          </div>

          <div class="form-group">
            {!! Form::label('password_confirmation', 'Retype Password') !!}
            <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation">
            
          </div>

           

           
 


        </div>

        <div class="tab-pane" id="advance">
            
          <div class="form-group">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address', null , array('class' => 'form-control', 'placeholder'=>'Address', 'value' => 'old(address)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('address2', 'Address 2') !!}
            {!! Form::text('address2', null , array('class' => 'form-control', 'placeholder'=>'Address 2', 'value' => 'old(address2)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('city', 'City') !!}
            {!! Form::text('city', null , array('class' => 'form-control', 'placeholder'=>'City', 'value' => 'old(city)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('state', 'State') !!}
            {!! Form::text('state', null , array('class' => 'form-control', 'placeholder'=>'State', 'value' => 'old(state)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('zip_code', 'Zip Code') !!}
            {!! Form::text('zip_code', null , array('class' => 'form-control', 'placeholder'=>'Zip Code', 'value' => 'old(zip_code)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', null , array('class' => 'form-control', 'placeholder'=>'Phone', 'value' => 'old(phone)')) !!}
           </div>     

           
 
        </div>

      
       
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Save</button>
  </div><!-- box-footer -->
</div><!-- /.box -->

{!! Form::close() !!}

@endsection