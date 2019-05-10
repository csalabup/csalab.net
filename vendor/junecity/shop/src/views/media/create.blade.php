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

<link href="{{ asset("/css/dropzone.css") }}" rel="stylesheet" type="text/css" />

{!! csrf_field() !!}
<form action="http://{{$bucket}}.s3.amazonaws.com/" method="post" class="dropzone" id="my-awesome-dropzone">


</form>



<script src="{{ asset ("/js/dropzone.js") }}"></script>


<script type="text/javascript">
var Str_random = '{{Str_random(30)}}';

Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 10, // MB
  //acceptedFiles: "image/jpeg,image/png,image/gif",
  accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { done(); }
  },

  

sending: function(file, xhr, formData) {

	formData.append('key', '{{$path}}/'+Str_random+'-${filename}');
	formData.append('acl', 'public-read');
	formData.append('Content-Type', file.type);
	formData.append('X-Amz-Credential', '{{$access_key}}/{{$upload[2]}}/{{$region}}/s3/aws4_request');
	formData.append('X-Amz-Algorithm', 'AWS4-HMAC-SHA256');
	formData.append('X-Amz-Date', '{{$upload[3]}}');
	formData.append('Policy', '{{$upload[1]}}');
	formData.append('X-Amz-Signature', '{{$upload[0]}}');
	formData.append('success_action_redirect', '{{$success_redirect}}');
},


success: function(file, _token){


	var token = document.getElementsByTagName('input').item(name="_token").value;
    var data = "_token="+token;

    var xhr = new XMLHttpRequest();
	xhr.open('POST', '/dashboard/media/store'+'?key={{$path}}/'+Str_random+'-'+file.name,true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send(data);

	console.log(file.type);




}






};	




</script>

@endsection