<?php $__env->startSection('content'); ?>






<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Items</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"><?php echo e($count); ?>test</span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  
  <ul class="list-group">
   <?php foreach($items as $item): ?> 

  

  <li type="button" class="list-group-item">

   
   
   
   <?php foreach($item->original as $i => $org): ?> 

   <?php if($i == 0): ?>

   <img src="<?php echo e(url('https://s3.amazonaws.com/junecity.com/')); ?><?php echo e($org->small_url); ?>" style="width:60px" class="img-rounded">
   
   <?php endif; ?>

   <?php endforeach; ?>

  <a href="<?php echo e(URL::route('edit-item', $item->id)); ?>"><?php echo e($item->name); ?></a>


  <div class="btn-group pull-right" role="group" aria-label="...">
  <a class="btn btn-default btn-xs" href="<?php echo e(URL::route('edit-item', $item->id)); ?>">edit</a>
  <a class="btn btn-default btn-xs" href="<?php echo e(URL::route('images', $item->id)); ?>">images</a>
  <a class="btn btn-default btn-xs" href="">delete</a>
</div>


  </li>

  <?php endforeach; ?>
 </ul>




  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
    <?php echo $items->render(); ?>

    </nav>
  </div><!-- box-footer -->
</div><!-- /.box -->





     
     




<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>