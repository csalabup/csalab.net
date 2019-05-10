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

<meta name="_token" content="{!! csrf_token() !!}"/>



<div class="box">
  <div class="box-header with-border">
  <h3 class="box-title">Manage Images</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">{{$count}}</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->


  <div class="box-header with-border">
    <form onsubmit="return Checkfiles();" action="http://{{$bucket}}.s3.amazonaws.com/" method="post" enctype="multipart/form-data">
<input type="hidden" name="key" value="{{$path}}/{{Str_random(30)}}.jpg" />
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
   
  </div><!-- /.box-header -->
  <div class="box-body">




<ul class="list-group">
 


<li class="list-group-item" v-repeat="user: users">
  
  <img src="@{{user }}"  style="width:60px" class="img-rounded"/>
            
           
</li>


</ul>
    
  
  <ul class="list-group">
@foreach($small_urls as $small_url)


  <li class="list-group-item">
  <a href="#" onclick="return launchEditor('{{$small_url->id}}','http://{{ $bucket }}.s3.amazonaws.com/{{$small_url->original_url}}');">
  <img id="{{$small_url->id}}" src="http://junecity.com.s3.amazonaws.com/{{$small_url->small_url}}" data-src="http://junecity.com.s3.amazonaws.com/{{$small_url->small_url}}" style="width:60px" class="img-rounded"/></a>
            
            <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-default btn-xs" href="#" onclick="return launchEditor('{{$small_url->id}}','http://{{ $bucket }}.s3.amazonaws.com/{{$small_url->original_url}}');">edit</a>
            <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#deleteModal{{$small_url->id}}">delete</a>            </div>


            </li>
 
<!-- Modal -->
<div class="modal fade" id="deleteModal{{$small_url->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      
      <ul class="list-group">



  <li class="list-group-item">
  
  <img id="{{$small_url->id}}" src="http://junecity.com.s3.amazonaws.com/{{$small_url->small_url}}" data-src="http://junecity.com.s3.amazonaws.com/{{$small_url->small_url}}" style="width:60px" class="img-rounded"/>
            



      </li>
</ul>



       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" href="{{ URL::route('delete-media', $small_url->id) }}">delete</a>
      </div>
    </div>
  </div>
</div>


@endforeach

 </ul>




  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
   {!! $small_urls->render() !!}
    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->





<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>

  <!-- Load widget code -->
<script type="text/javascript" src="http://feather.aviary.com/imaging/v3/editor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.16/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>

<script>
            var socket = io('http://192.168.10.10:3000');
            new Vue({
                el: 'body',
                data: {
                    users: []
                },
                ready: function() {
                    socket.on('test-channel:junecity\\Events\\OriginalCreated', function(data) {
                        this.users.push('http://junecity.com.s3.amazonaws.com/' + data.small_url);
                    }.bind(this));
                }
            });
        </script>

  <!-- Instantiate the widget -->
<script type="text/javascript">
   
    
   

    var featherEditor = new Aviary.Feather({
        apiKey: '88b222f2ff424fbf985feb944aa97201',
        theme: 'light',
        onSave: function(imageID, newURL) {

          featherEditor.close();

        $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                    });

    var img = document.getElementById(imageID);
        img.src = newURL;

        $.ajax({
                url: '/dashboard/media/update',
                type: "post",
                data: {'original_url': newURL, 'id': imageID},
                
               }); 
            
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



@endsection