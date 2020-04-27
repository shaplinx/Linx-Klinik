
<?php $__currentLoopData = $metadatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metadata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startSection('judul_halaman'); ?>
        <?php echo e($metadata->Judul); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('deskripsi_halaman'); ?>
        <?php echo e($metadata->Deskripsi); ?>

    <?php $__env->stopSection(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('konten'); ?>
<?php if(count($errors) > 0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="mb-0">
                <?php echo e($error); ?>

            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(session()->has('pesan')): ?>
     <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="mb-0">
                <?php echo e(session()->get('pesan')); ?>

            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php endif; ?>
    <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Formulir Pasien Baru</h6>
                </div>
                <div class="card-body">
                <div class="card-body">
                    <form class="user" action="/pasien/tambah/simpan/" method="post">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="Nama_Lengkap" placeholder="Nama Lengkap" >
                            </div>
                          <div class="col-sm-2">
                            <label align="center" class ="form-text">Tanggal lahir :</label>
                          </div>
                          <div class="col-sm-4">
                            <input type="date" class="form-control " name="Tanggal_Lahir" placeholder="Tanggal lahir">
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control " name="Alamat" placeholder="Alamat">
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control " name="Pekerjaan" placeholder="Pekerjaan">
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control " name="no_handphone" placeholder="Nomer Handphone">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <select class="form-control " name="Pendidikan_terakhir" placeholder="Pendidikan terakhir">
                                <option value="" selected disabled>Pendidikan Terakhir</option>
                                <option value="TS">Tidak Sekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="PT">Perguruan Tinggi</option>
                            </select>    
                          </div>
                          <div class="col-sm-6">
                            <select class="form-control " name="Jenis_Kelamin" placeholder="Jenis Kelamin">
                                <option value="" selected disabled>Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>

                            </select>
                          </div>
                        </div>
                            <div class="form-group">
                                <input type="text" class="form-control " name="no_bpjs" placeholder="Nomer BPJS (Tidak Wajib)">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control " name="alergi" placeholder="Daftar Alergi (Tidak Wajib)"></textarea>
                            </div>                                
                        <div class="form-group row">

                            <div class="col-sm-3">
                                <a href="/pasien/" class="btn btn-danger btn-block btn">
                                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan" >
                                    <i class="fas fa-save fa-fw"></i> Simpan
                                </button>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-warning btn-block" name ="simpan" value="simpan_baru">
                                    <i class="fas fa-plus fa-fw"></i> Simpan Dan Buat Baru
                                </button>
                            </div>    
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-success btn-block" name ="simpan" value="simpan_rm">
                                    <i class="fas fa-file fa-fw"></i> Simpan Dan Buka RM
                                </button>
                            </div>       
                        </div>
                    </form>
                </div>
              </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/form-pasien.blade.php ENDPATH**/ ?>