<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
<?php foreach($errors->all() as $error): ?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> <?php echo e($error); ?>

</div>

<?php endforeach; ?>
<?php endif; ?>

<?php echo Form::open(['role'=>'form',  'route'=>'store-role']); ?>     

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">New Role</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example 
      <span class="label label-primary">Label</span>-->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#basic" data-toggle="tab">BASIC</a></li>
        <li><a href="#users" data-toggle="tab">USERS</a></li>
       
        
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="basic">

          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           
           

           <div class="form-group">
            <?php echo Form::label('role', 'Role'); ?>

            <?php echo Form::text('role', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Role', 'value' => 'old(role)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('description', 'Description'); ?>

            <?php echo Form::textarea('description', null , array('class' => 'form-control', 'placeholder'=>'description', 'rows'=>3, 'value' => 'old(description)')); ?>

           </div>

        </div>


        <div class="tab-pane" id="users">
            
            <div id="inner-content-div">
            <ul class="list-group">

             
            <?php foreach($users as $user): ?>
  
            <li class="list-group-item">
            <input type="checkbox" name="<?php echo e($user->id); ?>"/>
            <a href="#"><?php echo e($user->email); ?></a>
            </li>

            <?php endforeach; ?>
           </ul>
           </div>
            
        </div>


       
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Create</button>
  </div><!-- box-footer -->
</div><!-- /.box -->

<?php echo Form::close(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>