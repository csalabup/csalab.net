<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($page_title) ? $page_title : "Dashboard"); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo e(asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css")); ?>" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo e(asset("/bower_components/bootstrap-fileinput/css/fileinput.min.css")); ?>" media="all" rel="stylesheet" type="text/css" />

   

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo e(asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="<?php echo e(asset("/bower_components/admin-lte/dist/css/skins/skin-purple-light.min.css")); ?>" rel="stylesheet" type="text/css" />

    <!-- iCheck -->
    <link href="<?php echo e(asset("/bower_components/admin-lte/plugins/iCheck/all.css")); ?>" rel="stylesheet" type="text/css" />

    <!-- site css -->
    <link href="<?php echo e(asset("/css/site.css")); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-purple-light">
<div class="wrapper">

    <!-- Header -->
    <?php echo $__env->make('junecity::layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Sidebar -->
    <?php echo $__env->make('junecity::layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e(isset($page_title) ? $page_title : "Page Title"); ?>

                <small><?php echo e(isset($page_description) ? $page_description : null); ?></small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <?php echo $__env->yieldContent('content'); ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    <?php echo $__env->make('junecity::layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js")); ?>"></script>

<script src="<?php echo e(asset ("/bower_components/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js")); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset ("/bower_components/bootstrap-fileinput/js/fileinput.min.js")); ?>"></script>




<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo e(asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js")); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset ("/bower_components/admin-lte/dist/js/app.min.js")); ?>" type="text/javascript"></script>

<!-- slimscroll -->
<script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js")); ?>"></script>

<!-- iCheck -->
<script src="<?php echo e(asset ("/bower_components/admin-lte/plugins/iCheck/icheck.min.js")); ?>"></script>






<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-purple',
    radioClass: 'iradio_square',
    increaseArea: '20%' // optional
  });

});
</script>

<script>
$(function(){
    $('#inner-content-div').slimScroll({
        height: '250px'
    });
});
</script>

<script type="text/javascript">

    $("#input-id").fileinput({'showUpload':true, 'previewFileType':'any'});



</script>

<script src="http://malsup.github.io/jquery.blockUI.js"></script>
<script type="text/javascript">

function Checkfiles()
{
var fup = document.getElementById('input-id');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png")
{

 $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } });
    
return true;
} 
else
{
alert("Upload gif, Jpg, or png images only");
fup.focus();
return false;
}
}



</script>



</body>
</html>