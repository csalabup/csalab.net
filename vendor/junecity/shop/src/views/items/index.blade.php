@extends('junecity::layouts.dashboard')
@section('content')






<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Items</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">{{ $count }}</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  
  <ul class="list-group">
   @foreach($items as $item) 

  

  <li type="button" class="list-group-item">

   
   
   
   @foreach($item->original as $i => $org) 

   @if($i == 0)

   <img src="{{url('https://s3.amazonaws.com/junecity.com/')}}{{$org->small_url}}" style="width:60px" class="img-rounded">
   
   @endif

   @endforeach

  <a href="{{ URL::route('edit-item', $item->id) }}">{{$item->name}}</a>


  <div class="btn-group pull-right" role="group" aria-label="...">
  <a class="btn btn-default btn-xs" href="{{ URL::route('edit-item', $item->id) }}">edit</a>
  <a class="btn btn-default btn-xs" href="{{ URL::route('images', $item->id) }}">images</a>
  <a class="btn btn-default btn-xs" href="">delete</a>
</div>


  </li>

  @endforeach
 </ul>




  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
    {!! $items->render() !!}
    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->





     
     




@endsection