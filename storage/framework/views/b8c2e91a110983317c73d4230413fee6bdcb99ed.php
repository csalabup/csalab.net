<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<?php foreach($errors->all() as $error): ?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> <?php echo e($error); ?>

</div>

<?php endforeach; ?>
<?php endif; ?>

<?php echo csrf_field(); ?>



<div class="box">
  <div class="box-header with-border">
  <h3 class="box-title">Manage Images</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary">{{items.length}}</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->

  <div class="box-body">


    
  
  <ul class="list-group">



  <li class="list-group-item" v-for="item in items">

  <a href="#" onclick="return launchEditor('{{item.id}}','http://<?php echo e($bucket); ?>.s3.amazonaws.com/{{item.original_url}}');">
  <img id="{{item.id}}" :src="item.thumb_key" data-src="http://junecity.com.s3.amazonaws.com/{{item.small_url}}" class="img-rounded"/></a>
            
            <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-default btn-xs" href="#" onclick="return launchEditor('{{item.id}}','http://<?php echo e($bucket); ?>.s3.amazonaws.com/{{item.original_url}}');">edit</a>
            <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#deleteModal{{item.id}}"  @click="deleteItems(item)">delete</a> </div>


    
    </li>





 </ul>




  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
   
    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->







  <!-- Load widget code -->
<script type="text/javascript" src="http://feather.aviary.com/imaging/v3/editor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>

<!-- jQuery 2.1.3 -->
<script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js")); ?>"></script>

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


<script type="text/javascript">
        
        
        new Vue({


           el: 'body',

           data: function(){

            return{
              items:[]
            };           

           },

           ready: function(){

            this.fetchData();

            
        },

           methods: {


              deleteItems: function(items, emulateJSON) {
                
                this.items.$remove(items);

                 var token = document.getElementsByTagName('input').item(name="_token").value;
                 var data = "_token="+token;

                 var xhr = new XMLHttpRequest();
                xhr.open('POST', '/dashboard/media/delete/'+items.id,true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhr.send(data);
              

                     },

               fetchData: function(){

                this.$http.get('/dashboard/media/index', function(images){
                  
                  this.items = images;
                 

                  }.bind(this));
               

                }

             }

          });


        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>