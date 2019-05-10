@extends('junecity::layouts.dashboard')
@section('content')

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Colors</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">{{ $count }}</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  
  <ul class="list-group">
   @foreach($colors as $color)

  <li type="button" class="list-group-item"><a href="{{ URL::route('edit-color', $color->id) }}">{{$color->color}}</a>
  
  
  <div class="btn-group pull-right" role="group" aria-label="...">
  <a class="btn btn-default btn-xs" href="{{ URL::route('edit-color', $color->id) }}">edit</a>
  <a class="btn btn-default btn-xs" href="">delete</a>
</div>


  </li>

  @endforeach
 </ul>




  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
    {!! $colors->render() !!}
    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->





@endsection