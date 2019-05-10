<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<?php foreach($errors->all() as $error): ?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> <?php echo e($error); ?>

</div>

<?php endforeach; ?>
<?php endif; ?>


<?php echo Form::model($settings, array('method' => 'put', 'route' => array('update-settings', $settings->id))); ?>


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Settings</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example 
      <span class="label label-primary">Label</span>-->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#info" data-toggle="tab">INFO</a></li>
        <li><a href="#advance" data-toggle="tab">ADVANCE</a></li>
        <li><a href="#shop" data-toggle="tab">SHOP</a></li>
        <li><a href="#logo" data-toggle="tab">LOGO</a></li>
        
        
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="info">

          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           
           

           <div class="form-group">
            <?php echo Form::label('business_name', 'Business Name'); ?>

            <?php echo Form::text('business_name', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Business Name', 'value' => 'old(business_name)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_about', 'About Business'); ?>

            <?php echo Form::textarea('business_about', null , array('class' => 'form-control', 'placeholder'=>'About Business', 'rows'=>3, 'value' => 'old(business_about)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_address', 'Address'); ?>

            <?php echo Form::text('business_address', null , array('class' => 'form-control', 'placeholder'=>'Business Address', 'value' => 'old(business_address)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_address2', 'Address 2'); ?>

            <?php echo Form::text('business_address2', null , array('class' => 'form-control', 'placeholder'=>'Business Address 2', 'value' => 'old(business_address2)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_city', 'City'); ?>

            <?php echo Form::text('business_city', null , array('class' => 'form-control', 'placeholder'=>'Business City', 'value' => 'old(business_city)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_state', 'State'); ?>

            <?php echo Form::text('business_state', null , array('class' => 'form-control', 'placeholder'=>'Business State', 'value' => 'old(business_state)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_zip_code', 'Zip Code'); ?>

            <?php echo Form::text('business_zip_code', null , array('class' => 'form-control', 'placeholder'=>'Business Zip Code', 'value' => 'old(business_zip_code)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_phone', 'Phone'); ?>

            <?php echo Form::text('business_phone', null , array('class' => 'form-control', 'placeholder'=>'Business Phone', 'value' => 'old(business_phone)')); ?>

           </div>

           
 


        </div>

        <div class="tab-pane" id="advance">
            
           <div class="form-group">
            <?php echo Form::label('business_website', 'Website'); ?>

            <?php echo Form::text('business_website', null , array('class' => 'form-control', 'placeholder'=>'Business Website', 'value' => 'old(business_website)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_facebook_page', 'Facebook Page'); ?>

            <?php echo Form::text('business_facebook_page', null , array('class' => 'form-control', 'placeholder'=>'Business Facebook Page', 'value' => 'old(business_facebook_page)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('business_twitter_page', 'Twitter Page'); ?>

            <?php echo Form::text('business_twitter_page', null , array('class' => 'form-control', 'placeholder'=>'Business Twitter Page', 'value' => 'old(business_twitter_page)')); ?>

           </div>  

           

           <h3>Business Hours</h3>

           <hr>

           <div class="form-group">
            <?php echo Form::label('open_monday', 'Open Monday'); ?>

            <?php echo Form::text('open_monday', null , array('class' => 'form-control', 'placeholder'=>'Open Monday', 'value' => 'old(open_monday)')); ?>

           </div> 

           <div class="form-group">
            <?php echo Form::label('close_monday', 'Close Monday'); ?>

            <?php echo Form::text('close_monday', null , array('class' => 'form-control', 'placeholder'=>'Close Monday', 'value' => 'old(close_monday)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('open_tuesday', 'Open Tuesday'); ?>

            <?php echo Form::text('open_tuesday', null , array('class' => 'form-control', 'placeholder'=>'Open Tuesday', 'value' => 'old(open_tueday)')); ?>

           </div> 

           <div class="form-group">
            <?php echo Form::label('close_tuesday', 'Close Tuesday'); ?>

            <?php echo Form::text('close_tuesday', null , array('class' => 'form-control', 'placeholder'=>'Close Tuesday', 'value' => 'old(close_tuesday)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('open_wednesday', 'Open Wednesday'); ?>

            <?php echo Form::text('open_wednesday', null , array('class' => 'form-control', 'placeholder'=>'Open Wednesday', 'value' => 'old(open_wednesday)')); ?>

           </div> 

           <div class="form-group">
            <?php echo Form::label('close_wednesday', 'Close Wednesday'); ?>

            <?php echo Form::text('close_wednesday', null , array('class' => 'form-control', 'placeholder'=>'Close Wednesday', 'value' => 'old(close_wednesday)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('open_thursday', 'Open Thursday'); ?>

            <?php echo Form::text('open_thursday', null , array('class' => 'form-control', 'placeholder'=>'Open Thursday', 'value' => 'old(open_thursday)')); ?>

           </div> 

           <div class="form-group">
            <?php echo Form::label('close_thursday', 'Close Thursday'); ?>

            <?php echo Form::text('close_thursday', null , array('class' => 'form-control', 'placeholder'=>'Close Thursday', 'value' => 'old(close_thurday)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('open_friday', 'Open Friday'); ?>

            <?php echo Form::text('open_friday', null , array('class' => 'form-control', 'placeholder'=>'Open Friday', 'value' => 'old(open_friday)')); ?>

           </div> 

           <div class="form-group">
            <?php echo Form::label('close_friday', 'Close Friday'); ?>

            <?php echo Form::text('close_friday', null , array('class' => 'form-control', 'placeholder'=>'Close Friday', 'value' => 'old(close_friday)')); ?>

           </div>
           
           <div class="form-group">
            <?php echo Form::label('open_saturday', 'Open Saturday'); ?>

            <?php echo Form::text('open_saturday', null , array('class' => 'form-control', 'placeholder'=>'Open Saturday', 'value' => 'old(open_saturday)')); ?>

           </div> 

           <div class="form-group">
            <?php echo Form::label('close_saturday', 'Close Saturday'); ?>

            <?php echo Form::text('close_saturday', null , array('class' => 'form-control', 'placeholder'=>'Close Saturday', 'value' => 'old(close_saturday)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('open_sunday', 'Open Sunday'); ?>

            <?php echo Form::text('open_sunday', null , array('class' => 'form-control', 'placeholder'=>'Open Sunday', 'value' => 'old(open_sunday)')); ?>

           </div> 

           <div class="form-group">
            <?php echo Form::label('close_sunday', 'Close Sunday'); ?>

            <?php echo Form::text('close_sunday', null , array('class' => 'form-control', 'placeholder'=>'Close Sunday', 'value' => 'old(close_Sunday)')); ?>

           </div>
 
        </div>
        <div class="tab-pane" id="shop">

           <div class="form-group">
           <?php echo Form::label('shop_name', 'Shop Name'); ?>

           <a href="/shop/<?php echo e($settings->shop_name); ?>">(Link to my shop <?php echo e($settings->shop_name); ?>)</a>
            
            <?php echo Form::text('shop_name', null , array('class' => 'form-control', 'placeholder'=>'Shop Name', 'value' => 'old(shop_name)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('tax', 'Tax'); ?>

            <?php echo Form::text('tax', null , array('class' => 'form-control', 'placeholder'=>'Tax', 'value' => 'old(tax)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('shipping', 'Shipping'); ?>

            <?php echo Form::text('shipping', null , array('class' => 'form-control', 'placeholder'=>'Shipping', 'value' => 'old(shipping)')); ?>

           </div>
            
           <div class="form-group">
            <?php echo Form::label('stripe_secret_key', 'Stripe Secret Key'); ?>

            <?php echo Form::text('stripe_secret_key', null , array('class' => 'form-control', 'placeholder'=>'Stripe Secret Key', 'value' => 'old(stripe_secret_key)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('stripe_public_key', 'Stripe Public Key'); ?>

            <?php echo Form::text('stripe_public_key', null , array('class' => 'form-control', 'placeholder'=>'Stripe Public Key', 'value' => 'old(stripe_public_key)')); ?>

           </div>
 
            
        </div>

         <div class="tab-pane" id="logo">

          
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