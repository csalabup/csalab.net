<?php $__env->startSection('content'); ?>


<?php echo Form::open(['route' => array('image-update', $item->id)]); ?>




<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Images</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <span class="label label-primary"><?php echo e($count); ?></span>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
  

    <ul class="list-group">
             
             <?php foreach($originals as $original): ?> 

            


            <?php if($original->pivot): ?>
          
            <li class="list-group-item">
            <input type="checkbox" name="<?php echo e($original->id); ?>" checked/>
            <img src="<?php echo e(url('https://s3.amazonaws.com/junecity.com/')); ?><?php echo e($original->small_url); ?>" class="img-rounded" style="width:60px">
            
            <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-default btn-xs" href="<?php echo e(URL::route('media')); ?>">edit</a>
            <a class="btn btn-default btn-xs" href="">delete</a>
            </div>


            </li>

            <?php else: ?>
          
            <li class="list-group-item">
            <input type="checkbox" name="<?php echo e($original->id); ?>"/>
            <img src="<?php echo e(url('https://s3.amazonaws.com/junecity.com/')); ?><?php echo e($original->small_url); ?>" class="img-rounded" style="width:60px">
            
            <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-default btn-xs" href="<?php echo e(URL::route('media')); ?>">edit</a>
            <a class="btn btn-default btn-xs" href="">delete</a>
            </div>


            </li>
          
            <?php endif; ?>



            <?php endforeach; ?>
            </ul>





  </div><!-- /.box-body -->
  <div class="box-footer">
    <nav>
   
    </nav>

    <button type="submit" class="btn btn-primary">Add</button>
  </div><!-- box-footer -->
</div><!-- /.box -->



<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>