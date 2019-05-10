<?php $__env->startSection('content'); ?>






<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Users</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"><?php echo e($users->count()); ?></span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  
  <ul class="list-group">
   <?php foreach($users as $user): ?> 

  

  <li type="button" class="list-group-item"> 

 

    <?php if($user->role == 'SuperAdmin' ): ?>

      <i class="fa fa-circle text-red"></i>

      <?php elseif($user->role == 'Admin' ): ?>

      <i class="fa fa-circle text-yellow"></i>
       
      <?php elseif($user->role == 'Regular' ): ?>

      <i class="fa fa-circle text-gray"></i>

     <?php endif; ?>
     


  <a href="<?php echo e(URL::route('edit-user', $user->id)); ?>">


  <?php echo e($user->email); ?>


  </a>


  <div class="btn-group pull-right" role="group" aria-label="...">
  <a class="btn btn-default btn-xs" href="<?php echo e(URL::route('edit-user', $user->id)); ?>">edit</a>
  
  <a class="btn btn-default btn-xs" href="">delete</a>
</div>


  </li>

  <?php endforeach; ?>
 </ul>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
    <?php echo $users->render(); ?>

    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->





     
     




<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>