<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<?php foreach($errors->all() as $error): ?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> <?php echo e($error); ?>

</div>

<?php endforeach; ?>
<?php endif; ?>

<link href="<?php echo e(asset("/css/dropzone.css")); ?>" rel="stylesheet" type="text/css" />

<?php echo csrf_field(); ?>

<form action="http://<?php echo e($bucket); ?>.s3.amazonaws.com/" method="post" class="dropzone" id="my-awesome-dropzone">


</form>



<script src="<?php echo e(asset ("/js/dropzone.js")); ?>"></script>


<script type="text/javascript">
var Str_random = '<?php echo e(Str_random(30)); ?>';

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

	formData.append('key', '<?php echo e($path); ?>/'+Str_random+'-${filename}');
	formData.append('acl', 'public-read');
	formData.append('Content-Type', file.type);
	formData.append('X-Amz-Credential', '<?php echo e($access_key); ?>/<?php echo e($upload[2]); ?>/<?php echo e($region); ?>/s3/aws4_request');
	formData.append('X-Amz-Algorithm', 'AWS4-HMAC-SHA256');
	formData.append('X-Amz-Date', '<?php echo e($upload[3]); ?>');
	formData.append('Policy', '<?php echo e($upload[1]); ?>');
	formData.append('X-Amz-Signature', '<?php echo e($upload[0]); ?>');
	formData.append('success_action_redirect', '<?php echo e($success_redirect); ?>');
},


success: function(file, _token){


	var token = document.getElementsByTagName('input').item(name="_token").value;
    var data = "_token="+token;

    var xhr = new XMLHttpRequest();
	xhr.open('POST', '/dashboard/media/store'+'?key=<?php echo e($path); ?>/'+Str_random+'-'+file.name,true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send(data);

	console.log(file.type);




}






};	




</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>