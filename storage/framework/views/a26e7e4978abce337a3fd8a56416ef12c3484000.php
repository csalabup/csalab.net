<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<?php foreach($errors->all() as $error): ?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> <?php echo e($error); ?>

</div>

<?php endforeach; ?>
<?php endif; ?>

<?php echo Form::open(['role'=>'form', 'class'=>'mdl-cell mdl-cell--12-col mdl-grid', 'route'=>'store-item', 'files' => true]); ?>


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">New item</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example 
      <span class="label label-primary">Label</span>-->
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->


  <div class="box-body">
    
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#basic" data-toggle="tab">BASIC</a></li>
        <li><a href="#advance" data-toggle="tab">ADVANCE</a></li>
        <li><a href="#category" data-toggle="tab">CATEGORIES</a></li>
        <li><a href="#seo" data-toggle="tab">SEO</a></li>
        
    </ul>
    <div id="my-tab-content" class="tab-content">

        <div class="tab-pane active" id="basic">

          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           
           

           <div class="form-group">
            <?php echo Form::label('name', 'Name'); ?>

            <?php echo Form::text('name', null , array('class' => 'form-control', 'autofocus'=>'', 'placeholder'=>'Name', 'value' => 'old(name)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('description', 'Description'); ?>

            <?php echo Form::textarea('description', null , array('class' => 'form-control', 'placeholder'=>'description', 'rows'=>3, 'value' => 'old(description)')); ?>

           </div>

    

        </div>

        <div class="tab-pane" id="advance">
            
            

            <div class="form-group">
            <?php echo Form::label('price', 'Price'); ?>

            <?php echo Form::text('price', null , array('class' => 'form-control', 'placeholder'=>'Price', 'value' => 'old(Price)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('old_price', 'Old Price'); ?>

            <?php echo Form::text('old_price', null , array('class' => 'form-control', 'placeholder'=>'Old Price', 'value' => 'old(old_price)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('stock_quantity', 'Stock Quantity'); ?>

            <?php echo Form::text('stock_quantity', null , array('class' => 'form-control', 'placeholder'=>'Stock Quantity', 'value' => 'old(stock_quantity)')); ?>

           </div>

           
           <div class="form-group">
            <?php echo Form::label('sku', 'Sku'); ?>

            <?php echo Form::text('sku', null , array('class' => 'form-control', 'placeholder'=>'Sku', 'value' => 'old(sku)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('manufacturer_part_number', 'Manufacturer Part Number'); ?>

            <?php echo Form::text('manufacturer_part_number', null , array('class' => 'form-control', 'placeholder'=>'Manufacturer Part Number', 'value' => 'old(manufacturer_part_number)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('gtin', 'Gtin'); ?>

            <?php echo Form::text('gtin', null , array('class' => 'form-control', 'placeholder'=>'Gtin', 'value' => 'old(gtin)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::checkbox('published', true, true, ['id' => 'published', 'value' => 'old("published")']); ?>

            <?php echo Form::label('published', 'Published'); ?>

           </div>

           <div class="form-group">
            <?php echo Form::checkbox('show_on_home_page', true, true, ['id' => 'show_on_home_page', 'class' => 'mdl-switch__input', 'value' => 'old("show_on_home_page")']); ?>

            <?php echo Form::label('show_on_home_page', 'Show On Home Page'); ?>

           </div>

           <div class="form-group">
            <?php echo Form::checkbox('disable_buy_button', true, null, ['id' => 'disable_buy_button', 'class' => 'mdl-switch__input', 'value' => 'old("disable_buy_button")']); ?>

            <?php echo Form::label('disable_buy_button', 'Disable Buy Button'); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('order_minimum_quantity', 'Order Minimum Quantity'); ?>

            <?php echo Form::text('order_minimum_quantity', null , array('class' => 'form-control', 'placeholder'=>'Order Minimum Quantity', 'value' => 'old(order_minimum_quantity)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('order_maximum_quantity', 'Order Maximum Quantity'); ?>

            <?php echo Form::text('order_maximum_quantity', null , array('class' => 'form-control', 'laceholder'=>'Order Maximum Quantity', 'value' => 'old(order_maximum_quantity)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('weight', 'Weight'); ?>

            <?php echo Form::text('weight', null , array('class' => 'form-control', 'placeholder'=>'weight', 'value' => 'old(weight)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('length', 'Length'); ?>

            <?php echo Form::text('length', null , array('class' => 'form-control', 'placeholder'=>'length', 'value' => 'old(length)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('width', 'Width'); ?>

            <?php echo Form::text('width', null , array('class' => 'form-control', 'placeholder'=>'width', 'value' => 'old(width)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('height', 'Height'); ?>

            <?php echo Form::text('height', null , array('class' => 'form-control', 'placeholder'=>'Height', 'value' => 'old(height)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('display_order', 'Display Order'); ?>

            <?php echo Form::text('display_order', null , array('class' => 'form-control', 'placeholder'=>'Display Order', 'value' => 'old(display_order)')); ?>

           </div>


        </div>
        <div class="tab-pane" id="category">
            
            <div id="inner-content-div">
            <ul class="list-group">
             
            <?php foreach($categories as $category): ?>

            <li class="list-group-item">
            <input type="checkbox" id="<?php echo e($category->id); ?>"/>
            <a href="<?php echo e(URL::route('edit-category', $category->id)); ?>"><?php echo e($category->name); ?></a>
            </li>

            <?php endforeach; ?>

            </ul>
            </div>
            
        </div>

        


        <div class="tab-pane" id="seo">

          
           <div class="form-group">
            <?php echo Form::label('meta_keywords', 'Meta Keywords'); ?>

            <?php echo Form::text('meta_keywords', null , array('class' => 'form-control', 'placeholder'=>'Meta Keywords', 'value' => 'old(meta_keywords)')); ?>

           </div>
            
           <div class="form-group">
            <?php echo Form::label('meta_description', 'Meta Description'); ?>

            <?php echo Form::text('meta_description', null , array('class' => 'form-control', 'placeholder'=>'Meta Description', 'value' => 'old(meta_description)')); ?>

           </div>

           <div class="form-group">
            <?php echo Form::label('meta_title', 'Meta Title'); ?>

            <?php echo Form::text('meta_title', null , array('class' => 'form-control', 'placeholder'=>'Meta Title', 'value' => 'old(meta_title)')); ?>

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