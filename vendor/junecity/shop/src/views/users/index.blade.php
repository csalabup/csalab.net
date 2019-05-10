@extends('junecity::layouts.dashboard')
@section('content')






<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Users</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">{{ $users->count() }}</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  
  <ul class="list-group">
   @foreach($users as $user) 

  

  <li type="button" class="list-group-item"> 

 

    @if ($user->role == 'SuperAdmin' )

      <i class="fa fa-circle text-red"></i>

      @elseif ($user->role == 'Admin' )

      <i class="fa fa-circle text-yellow"></i>
       
      @elseif ($user->role == 'Regular' )

      <i class="fa fa-circle text-gray"></i>

     @endif
     


  <a href="{{ URL::route('edit-user', $user->id) }}">


  {{$user->name}}

  </a>


  <div class="btn-group pull-right" role="group" aria-label="...">
  <a class="btn btn-default btn-xs" href="{{ URL::route('edit-user', $user->id) }}">edit</a>
  
  <a class="btn btn-default btn-xs" href="">delete</a>
</div>


  </li>

  @endforeach
 </ul>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
    {!! $users->render() !!}
    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->





     
     




@endsection