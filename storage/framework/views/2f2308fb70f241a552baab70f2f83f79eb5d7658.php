<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg")); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Controls</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><span>ITEMS</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(URL::route('items')); ?>">ALL</a></li>
                    <li><a href="<?php echo e(URL::route('create-item')); ?>">CREATE</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>CATEGORIES</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(URL::route('categories')); ?>">ALL</a></li>
                    <li><a href="<?php echo e(URL::route('create-category')); ?>">CREATE</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>ATTRIBUTES</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                    <li><a href="#"><span>COLORS</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
                        <ul class="treeview-menu">
                        <li><a href="<?php echo e(URL::route('colors')); ?>">ALL</a></li>
                    <li><a href="<?php echo e(URL::route('create-color')); ?>">CREATE</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span>SIZES</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>
                        <ul class="treeview-menu">
                        <li><a href="<?php echo e(URL::route('sizes')); ?>">ALL</a></li>
                    <li><a href="<?php echo e(URL::route('create-size')); ?>">CREATE</a></li>
                       </ul>
                    </li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#"><span>MEDIA</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                        <li><a href="<?php echo e(URL::route('media')); ?>">ALL</a></li>
                    <li><a href="<?php echo e(URL::route('create-media')); ?>">CREATE</a></li>
                     
                </ul>
            </li>


            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>