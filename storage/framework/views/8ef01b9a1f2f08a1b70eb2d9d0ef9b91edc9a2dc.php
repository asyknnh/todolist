<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin 2 - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo e(asset('assets/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo e(asset('assets/css/sb-admin-2.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    </head>
    <body class="page-top">
        <div id="wrapper">
            <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="container-fluid">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>

                    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo e(asset('assets/vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo e(asset('assets/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo e(asset('assets/js/sb-admin-2.min.js')); ?>"></script>

        <!-- Page level plugins -->
        <script src="<?php echo e(asset('assets/vendor/chart.js/Chart.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('assets/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo e(asset('assets/js/demo/chart-area-demo.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/demo/chart-pie-demo.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/demo/datatables-demo.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\cybersecurity\ToDoList\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>