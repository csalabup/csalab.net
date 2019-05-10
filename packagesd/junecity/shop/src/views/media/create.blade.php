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




<form onsubmit="return Checkfiles();" action="http://{{$bucket}}.s3.amazonaws.com/" method="post" enctype="multipart/form-data">
<input type="hidden" name="key" value="{{$path}}/{{Str_random(30)}}-${filename}" />
<input type="hidden" name="acl" value="public-read" />
<input type="hidden" name="Content-Type" value="image/jpeg">
<input type="hidden" name="X-Amz-Credential" value="{{$access_key}}/{{$upload[2]}}/{{$region}}/s3/aws4_request" />
<input type="hidden" name="X-Amz-Algorithm" value="AWS4-HMAC-SHA256" />
<input type="hidden" name="X-Amz-Date" value="{{$upload[3]}}" />
<input type="hidden" name="Policy" value="{{$upload[1]}}" />
<input type="hidden" name="X-Amz-Signature" value="{{$upload[0]}}" />
<input type="hidden" name="success_action_redirect" value="{{$success_redirect}}" /> 
<input id="input-id" type="file" name="file" class="file" data-preview-file-type="text"/>
</form>


@endsection