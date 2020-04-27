
 <?php $__env->startSection('judul_halaman'); ?>
        Edit Profil
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('deskripsi_halaman'); ?>
        Lakukan pengeditan profil dengan mengisi form berikut.
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('konten'); ?>
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">               
        <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
    </div>
     <div class="card-body">
        <div class="row">
        <div class="col-md-4 align-items-center">
            <div class="row justify-content-center">
                <div class="profile-header-container">
                <div class="profile-header-img">
                    <img width="250px" class="rounded-circle img-fluid" src="/storage/avatars/<?php echo e($user->avatar); ?>" 
                    <!-- badge -->
                    <div class="rank-label-container text-center">
                        <h4><span class="badge badge-dark"><?php echo e(($user->profesi=="Dokter" ? 'dr. ':'')); ?><?php echo e(ucwords($user->name)); ?></span></h4>
                    </div>
                </div>
                </div>
        </div>
        </div>
        <div class="col-md-8">
        <form method="POST" action="<?php echo e(route('profile.simpan')); ?>" enctype="multipart/form-data">
        <?php echo method_field('patch'); ?>
            <?php echo csrf_field(); ?>
        
            <div class="form-group row">
                <input type="hidden" name ="id" value="<?php echo e($user->id); ?>">
                <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>
                <div class="col-md-8">
                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name',$user->name)); ?>" required autocomplete="name" autofocus>
                        <?php $__errorArgs = ['name'];
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
                
            <div class="form-group row">
                <label for="username" class="col-md-2 col-form-label text-md-right">Username</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username',$user->username)); ?>" required autocomplete="name" >
                        <?php $__errorArgs = ['username'];
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
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email',$user->email)); ?>" required autocomplete="email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                            <div class="col-md-6">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                  Ganti Password
                                </button>
                                  
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Ganti Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new-password">
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="btnClear" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Peubahan</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profesi" class="col-md-2 col-form-label text-md-right">Profesi</label>
                            <div class="col-md-6">
                                <select id="profesi" type="text" class="form-control <?php $__errorArgs = ['profesi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="profesi" required>
                                    <option value="Dokter" <?php echo e($user->profesi == "Dokter" ? 'selected':''); ?> >Dokter</option>
                                    <option value="Staff" <?php echo e($user->profesi == "Staff" ? 'selected':''); ?>>Staff</option>
                                    <?php $__errorArgs = ['profesi'];
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
                                </select>
                            </div>
                        </div>    
                        <?php if(Auth::user()->admin == 1): ?>
                        <div class="form-group row">
                            <label   class="col-md-2 col-form-label text-md-right">Jadikan Admin</label>
                        
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input id="admin" type="radio" class="form-check-input" value="0" name="admin" <?php echo e($user->admin == 0 ? 'checked':''); ?>><label class="form-check-label" for="admin"> Tidak</label>
                                </div>
                                <div class="form-check">
                                    <input id="admin" type="radio" class="form-check-input" value="1" name="admin" <?php echo e($user->admin == 1 ? 'checked':''); ?>><label class="form-check-label" for="admin"> Ya</label>
                                </div> 
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <label   class="col-md-2 col-form-label text-md-right">Foto Profil</label>
                        
                            <div class="col-md-6">
                                    <input type="file" id="avatar"  accept="image/*" name="avatar" id="avatarFile" aria-describedby="fileHelp" class="form-control-file">
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
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Perbaharui
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script>
	$(document).ready(function(){
		$('#btnClear').click(function(){					
				$('#password-confirm').val('');
				$('#password').val('');					
		});
	});
</script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/auth/profile.blade.php ENDPATH**/ ?>