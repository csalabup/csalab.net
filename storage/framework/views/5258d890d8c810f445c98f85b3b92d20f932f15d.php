<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<?php foreach($errors->all() as $error): ?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> <?php echo e($error); ?>

</div>

<?php endforeach; ?>
<?php endif; ?>




<form onsubmit="return Checkfiles();" action="http://<?php echo e($bucket); ?>.s3.amazonaws.com/" method="post" enctype="multipart/form-data">
<input type="hidden" name="key" value="<?php echo e($path); ?>/<?php echo e(Str_random(30)); ?>-${filename}" />
<input type="hidden" name="acl" value="public-read" />
<input type="hidden" name="Content-Type" value="image/jpeg">
<input type="hidden" name="X-Amz-Credential" value="<?php echo e($access_key); ?>/<?php echo e($upload[2]); ?>/<?php echo e($region); ?>/s3/aws4_request" />
<input type="hidden" name="X-Amz-Algorithm" value="AWS4-HMAC-SHA256" />
<input type="hidden" name="X-Amz-Date" value="<?php echo e($upload[3]); ?>" />
<input type="hidden" name="Policy" value="<?php echo e($upload[1]); ?>" />
<input type="hidden" name="X-Amz-Signature" value="<?php echo e($upload[0]); ?>" />
<input type="hidden" name="success_action_redirect" value="<?php echo e($success_redirect); ?>" /> 
<input id="input-id" type="file" name="file" class="file" data-preview-file-type="text"/>
</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>