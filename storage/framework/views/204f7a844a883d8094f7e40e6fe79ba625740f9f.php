<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $__env->yieldContent('title'); ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo e(URL::asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column h-100 my-auto ">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid ">
        
            <div class="modal show" style="padding-right: 19px; display: block;" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <!-- 404 Error Text -->
                    <div class="text-center">
                      <div class="error mx-auto" data-text="<?php echo $__env->yieldContent('code'); ?>"><?php echo $__env->yieldContent('code'); ?></div>
                      <p class="lead text-gray-800 mb-5"><?php echo $__env->yieldContent('message'); ?></p>
                      <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                    </div>
                  </div>
                  <div class="modal-footer flex-center">
                    <a class="btn btn-danger" href="<?php echo e(route('dashboard')); ?>">&larr; Kembali</a>
                  </div>
                </div>
              </div>
            </div>
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Custom styles for this template-->
  <link href="<?php echo e(URL::asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
   <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(URL::asset('vendor/jquery/jquery.min.js')); ?>"></script> 
  <script src="<?php echo e(URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('/js/printThis.js')); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(URL::asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/errors/minimal.blade.php ENDPATH**/ ?>