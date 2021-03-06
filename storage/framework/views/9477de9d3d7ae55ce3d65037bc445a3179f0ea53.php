<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
<?php foreach($errors->all() as $error): ?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> <?php echo e($error); ?>

</div>

<?php endforeach; ?>
<?php endif; ?>

<?php echo Form::model($color, array('method' => 'put', 'route' => array('update-color', $color->id), 'files' => true)); ?>      

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Name: <?php echo e($color->color); ?></h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example 
      <span class="label label-primary">Label</span>-->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#basic" data-toggle="tab">BASIC</a></li>
        <li><a href="#items" data-toggle="tab">ITEMS</a></li>
       
        
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="basic">

          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           
           

           <div class="form-group">
            <?php echo Form::label('color', 'Color'); ?>

            <?php echo Form::text('color', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Color', 'value' => 'old(color)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('description', 'Description'); ?>

            <?php echo Form::textarea('description', null , array('class' => 'form-control', 'placeholder'=>'description', 'rows'=>3, 'value' => 'old(description)')); ?>

           </div>

        </div>


        <div class="tab-pane" id="items">
            
            <div id="inner-content-div">
            <ul class="list-group">

             
            <?php foreach($items as $item): ?>

            


            <?php if($item->pivot): ?>
          
            <li class="list-group-item">
            <input type="checkbox" name="<?php echo e($item->id); ?>" checked/>
            <a href="<?php echo e(URL::route('edit-item', $item->id)); ?>"><?php echo e($item->name); ?></a>
            </li>

            <?php else: ?>
          
            <li class="list-group-item">
            <input type="checkbox" name="<?php echo e($item->id); ?>"/>
            <a href="<?php echo e(URL::route('edit-item', $item->id)); ?>"><?php echo e($item->name); ?></a>
            </li>
          
            <?php endif; ?>



            <?php endforeach; ?>
           
           </ul>
           </div>
            
        </div>


       
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Update</button>
  </div><!-- box-footer -->
</div><!-- /.box -->

<?php echo Form::close(); ?>



          
<?php $__env->stopSection(); ?>
<?php echo $__env->make('junecity::layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>