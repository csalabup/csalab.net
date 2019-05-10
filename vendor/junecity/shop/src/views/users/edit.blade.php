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


{!! Form::model($user, array('method' => 'put', 'route' => array('update-user', $user->id))) !!}

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Edit User</h3>
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
        <li><a href="#certificates" data-toggle="tab">CERTIFICATES</a></li>
        @can('SuperAdminAccess', $user)
        <li><a href="#role" data-toggle="tab">ROLE</a></li>

        @endcan

        @if($user->role != 'Regular')

        <li><a href="#users" data-toggle="tab">USERS</a></li>
        
        @endif


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


        </div>


        <div class="tab-pane active" id="certificates">

          
          <h6>Certificates</h6>


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
       
       @can('SuperAdminAccess', $user)

        <div class="tab-pane" id="role">
            
        <div class="form-group">   
         {!! Form::select('role', ['Regular' => 'Regular', 'Admin' => 'Admin'], null, ['class' => 'form-control']) !!}
        </div>   
 
        </div>


        <div class="tab-pane" id="users">
            
           <ul class="list-group">
   @foreach($own_users as $own_user) 

  

  <li type="button" class="list-group-item"> 

 

    @if ($own_user->role == 'SuperAdmin' )

      <i class="fa fa-circle text-red"></i>

      @elseif ($own_user->role == 'Admin' )

      <i class="fa fa-circle text-yellow"></i>
       
      @elseif ($own_user->role == 'Regular' )

      <i class="fa fa-circle text-gray"></i>

     @endif
     


  <a href="{{ URL::route('edit-user', $own_user->id) }}">


  {{$own_user->email}}

  </a>


  <div class="btn-group pull-right" role="group" aria-label="...">
  <a class="btn btn-default btn-xs" href="{{ URL::route('edit-user', $own_user->id) }}">edit</a>
  
  <a class="btn btn-default btn-xs" href="">delete</a>
</div>


  </li>

  @endforeach
 </ul>   
        
 
        </div>



       @endcan
      
       
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Save</button>
  </div><!-- box-footer -->
</div><!-- /.box -->

{!! Form::close() !!}

@endsection