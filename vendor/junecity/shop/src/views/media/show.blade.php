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








  
  <!-- Load widget code -->
<script type="text/javascript" src="http://feather.aviary.com/imaging/v3/editor.js"></script>

  <!-- Instantiate the widget -->
<script type="text/javascript">

    var featherEditor = new Aviary.Feather({
        apiKey: '88b222f2ff424fbf985feb944aa97201',
        theme: 'light',
        onSave: function(imageID, newURL) {
            var img = document.getElementById(imageID);
            img.src = newURL;
        }
    });

    function launchEditor(id, src) {
        featherEditor.launch({
            image: id,
            url: src,
        });
        return false;
    }

</script> 

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">New Image</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  

<a href="#" onclick="return launchEditor('editableimage1','http://{{ $my_bucket }}.s3.amazonaws.com/{{ $key }}');">Edit!</a>   

<img class="img-responsive" id="editableimage1" src="http://{{ $my_bucket }}.s3.amazonaws.com/{{ $key }}"/>
 


  </div><!-- /.box-body -->

    <div class="box-footer">
    <button type="submit" class="btn btn-primary">Add to Item</button>
  </div><!-- box-footer -->

</div><!-- /.box -->











@endsection