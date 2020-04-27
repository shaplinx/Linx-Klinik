
<?php $__currentLoopData = $metadatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metadata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startSection('judul_halaman'); ?>
        <?php echo e($metadata->Judul); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('deskripsi_halaman'); ?>
        <?php echo e($metadata->Deskripsi); ?>

    <?php $__env->stopSection(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('konten'); ?>
    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card shadow mb-4">
                <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Formulir Pengaturan</h6>
                </div>
                <div class="card-body">
                <div class="card-body">
              
                    <form class="user" action="<?php echo e(route('pengaturan.simpan')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PATCH')); ?>

                        <div class="form-group row">
                            <h7 class="m-10 font-weight-bold font-italic text-secondary">Pengaturan Umum</h7>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Nama Klinik</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="nama_klinik" value="<?php echo e($data->n_Klinik); ?>" placeholder="Nama Obat" >
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Slogan</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="slogan" value="<?php echo e($data->Slogan); ?>" placeholder="Slogan" >
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Logo <p class="font-italic">(Hanya Kode FontAwesome)</p></label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control" name="logo" value="<?php echo e($data->logo); ?>" placeholder="Slogan" >
                            </div>                    
                         </div>
                           <div class="form-group row">
                           <div class="col-md-4 "></div>
                            
                            <div class="col-md-8 ">
                                <input type="checkbox" name="gambarbool" value="1" class="form-check-input" <?php echo e(($data->gambarbool === 1) ? 'checked' : ''); ?>>
                                <label for="gambarbool" class="form-check-label"> Gunakan gambar sebagai logo?</label>
                            </div>
                           
                           </div>
                        <div class="form-group row">
                            <label   class="col-sm-4 col-form-label text-md-right">Logo Gambar</label>
                    
                        
                            <div class="col-md-8">
                                    <input type="file" id="gambar"  accept="image/*" name="gambar" id="avatarFile" aria-describedby="fileHelp" class="form-control-file">
                                    <small id="fileHelp" class="form-text text-muted">Mohon ukuran file tidak melebihi 2MB.</small>
                                    <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert"
                                    <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <?php if($data->gambar !== NULL): ?>
                        <div class="form-group row">
                           <div class="col-md-4 "></div>
                            
                            <div class="col-md-8 ">
                                <input type="image" class ="img-fluid" id="image" value="<?php echo e($data->gambar); ?>" alt="Login" src="storage/logo/<?php echo e($data->gambar); ?>"</input>
                            </div>
                           
                           </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <h7 class="m-10 font-weight-bold font-italic text-secondary">Pengaturan Khusus</h7>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Jasa Dokter</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp. </div>
                                    </div>
                                <input type="text" class="form-control " name="jasa" value="<?php echo e($data->jasa); ?>" placeholder="Jasa Dokter">
                                </div>
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mb-sm-0">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <button type="submit" class="form-control btn-primary"><i class="fas fa-save"></i>  Simpan</i></button>
                            </div>
                         </div>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
                
                  <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("obat.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
         
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
     

$( document ).ready(function() {
    $('.icp-auto').iconpicker();
});
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/setting.blade.php ENDPATH**/ ?>