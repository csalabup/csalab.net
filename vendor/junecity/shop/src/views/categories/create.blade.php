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



{!! Form::open(['role'=>'form', 'route'=>'store-category']) !!}

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">New Category</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example 
      <span class="label label-primary">Label</span>-->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#basic" data-toggle="tab">BASIC</a></li>
        <li><a href="#advance" data-toggle="tab">ADVANCE</a></li>
        <li><a href="#items" data-toggle="tab">ITEMS</a></li>
        <li><a href="#seo" data-toggle="tab">SEO</a></li>
        
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="basic">

          <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
           

           <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Name', 'value' => 'old(name)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null , array('class' => 'form-control', 'placeholder'=>'description', 'rows'=>3, 'value' => 'old(description)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('url_link', 'Url Link') !!}
            {!! Form::text('url_link', null , array('class' => 'form-control', 'placeholder'=>'Url Link', 'value' => 'old(url_link)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('display_order', 'Display Order') !!}
            {!! Form::text('display_order', null , array('class' => 'form-control', 'placeholder'=>'Display Order', 'value' => 'old(display_order)')) !!}
           </div>

           


        </div>

        <div class="tab-pane" id="advance">
            
            

            

           <div class="form-group">
            {!! Form::checkbox('published', true, true, ['id' => 'published', 'value' => 'old("published")']) !!}
            {!! Form::label('published', 'Published') !!}
           </div>

           <div class="form-group">
            {!! Form::checkbox('show_on_home_page', true, null, ['id' => 'show_on_home_page', 'value' => 'old("show_on_home_page")']) !!}
            {!! Form::label('show_on_home_page', 'Show On Home Page') !!}
           </div>

           <div class="form-group">
            {!! Form::checkbox('include_in_top_menu', true, true, ['id' => 'include_in_top_menu', 'value' => 'old("include_in_top_menu")']) !!}
            {!! Form::label('include_in_top_menu', 'Include In Top Menu') !!}
           </div>

           

           


        </div>
        <div class="tab-pane" id="items">
            
            <div id="inner-content-div">

            <ul class="list-group">
             
            @foreach($items as $item)
  
            <li class="list-group-item">
            <input type="checkbox" name="{{ $item->id }}"/>
            <a href="{{ URL::route('edit-item', $item->id) }}">{{$item->name}}</a>
            </li>

            @endforeach

            </ul>

           </div>
            
        </div>


        <div class="tab-pane" id="seo">

          
           <div class="form-group">
            {!! Form::label('meta_keywords', 'Meta Keywords') !!}
            {!! Form::text('meta_keywords', null , array('class' => 'form-control', 'placeholder'=>'Meta Keywords', 'value' => 'old(meta_keywords)')) !!}
           </div>
            
           <div class="form-group">
            {!! Form::label('meta_description', 'Meta Description') !!}
            {!! Form::text('meta_description', null , array('class' => 'form-control', 'placeholder'=>'Meta Description', 'value' => 'old(meta_description)')) !!}
           </div>

           <div class="form-group">
            {!! Form::label('meta_title', 'Meta Title') !!}
            {!! Form::text('meta_title', null , array('class' => 'form-control', 'placeholder'=>'Meta Title', 'value' => 'old(meta_title)')) !!}
           </div>
           

        </div>
       
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Create</button>
  </div><!-- box-footer -->
</div><!-- /.box -->

{!! Form::close() !!}



@endsection