<?php $__env->startSection('content'); ?>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Colors</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"><?php echo e($count); ?></span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  
  <ul class="list-group">
   <?php foreach($colors as $color): ?>

  <li type="button" class="list-group-item"><a href="<?php echo e(URL::route('edit-color', $color->id)); ?>"><?php echo e($color->color); ?></a>
  
  
  <div class="btn-group pull-right" role="group" aria-label="...">
  <a class="btn btn-default btn-xs" href="<?php echo e(URL::route('edit-color', $color->id)); ?>">edit</a>
  <a class="btn btn-default btn-xs" href="">delete</a>
</div>


  </li>

  <?php endforeach; ?>
 </ul>




  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
    <?php echo $colors->render(); ?>

    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->





<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>