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
 

           <?php if (Gate::check('AdminAccess', $user)): ?>

           <!-- Optionally, you can add icons to the links -->

           <li class="treeview">
                <a href="#"><span>OPERATORS</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                    <li><a href="<?php echo e(URL::route('users')); ?>">SHOW</a></li>
                    
                    <li><a href="<?php echo e(URL::route('create-user')); ?>">CREATE</a></li>
                     
                </ul>
            </li>

            
           <li class="treeview">
                <a href="#"><span>TRAINING</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                        <li><a href="">NEW TRAINING</a></li>
                        <li><a href="">ASSIGN TRAINING</a></li>
                    <li><a href="">COMPLETED TRAINING</a></li>
                     
                </ul>
            </li>
           

            

            <li class="treeview">
                <a href="#"><span>PROFILE</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(URL::route('edit-user', $user->id)); ?>">SHOW</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>SETTINGS</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                        <li><a href="<?php echo e(URL::route('settings')); ?>">SHOW</a></li>
                    
                     
                </ul>
            </li>



           <?php endif; ?>

           <?php if (Gate::check('SuperAdminAccess', $user)): ?>
            <!-- Optionally, you can add icons to the links -->
           
          
            
           
           <li class="treeview">
                <a href="#"><span>ACCOUNTS AND OPERATORS</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                    <li><a href="<?php echo e(URL::route('users')); ?>">SHOW</a></li>
                    
                    <li><a href="<?php echo e(URL::route('create-user')); ?>">CREATE</a></li>
                     
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>TRAINING</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                        <li><a href="">NEW TRAINING</a></li>
                        <li><a href="">ASSIGN TRAINING</a></li>
                    <li><a href="">COMPLETED TRAINING</a></li>
                     
                </ul>
            </li>

             <li class="treeview">
                <a href="#"><span>MEDIA</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                        <li><a href="<?php echo e(URL::route('media')); ?>">ALL</a></li>
                    <li><a href="<?php echo e(URL::route('create-media')); ?>">CREATE</a></li>
                     
                </ul>
            </li>

            

             <li class="treeview">
                <a href="#"><span>PROFILE</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(URL::route('edit-user', $user->id)); ?>">SHOW</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>SETTINGS</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                        <li><a href="<?php echo e(URL::route('settings')); ?>">SHOW</a></li>
                    
                     
                </ul>
            </li>

            

           <?php endif; ?>

           <?php if (Gate::check('RegularAccess', $user)): ?>

           <li class="treeview">
                <a href="#"><span>TRAINING</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                   
                        <li><a href="">NEW TRAINING</a></li>
                    <li><a href="">COMPLETED TRAINING</a></li>
                    <li><a href="">CERTIFICATES</a></li>
                     
                </ul>
            </li>

           <li class="treeview">
                <a href="#"><span>PROFILE</span> <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span></a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo e(URL::route('edit-user', $user->id)); ?>">SHOW</a></li>
                </ul>
            </li>
           <?php endif; ?>

            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>