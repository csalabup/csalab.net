@extends('junecity::layouts.dashboard')
@section('content')


{!! Form::open(['route' => array('image-update', $item->id)]) !!}



<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Images</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">{{ $count }}</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  

    <ul class="list-group">
             
             @foreach($originals as $original) 

            


            @if ($original->pivot)
          
            <li class="list-group-item">
            <input type="checkbox" name="{{$original->id}}" checked/>
            <img src="{{url('https://s3.amazonaws.com/junecity.com/')}}{{$original->small_url}}" class="img-rounded" style="width:60px">
            
            <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-default btn-xs" href="{{ URL::route('media') }}">edit</a>
            <a class="btn btn-default btn-xs" href="">delete</a>
            </div>


            </li>

            @else
          
            <li class="list-group-item">
            <input type="checkbox" name="{{$original->id}}"/>
            <img src="{{url('https://s3.amazonaws.com/junecity.com/')}}{{$original->small_url}}" class="img-rounded" style="width:60px">
            
            <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-default btn-xs" href="{{ URL::route('media') }}">edit</a>
            <a class="btn btn-default btn-xs" href="">delete</a>
            </div>


            </li>
          
            @endif



            @endforeach
            </ul>





  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
   
    </nav>

    <button type="submit" class="btn btn-primary">Add</button>
  </div><!-- box-footer -->
</div><!-- /.box -->



{!! Form::close() !!}

@endsection