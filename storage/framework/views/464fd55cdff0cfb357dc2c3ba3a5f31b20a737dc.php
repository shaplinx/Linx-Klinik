
<?php $__currentLoopData = $metadatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metadata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startSection('judul_halaman'); ?>
        <?php echo e($metadata->Judul); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('deskripsi_halaman'); ?>
        <?php echo e($metadata->Deskripsi); ?>

    <?php $__env->stopSection(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('konten'); ?>

<!--Modal Konfirmasi Delete-->
    <div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog modal-dialog modal-dialog-centered ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <h4 class="modal-title text-center text-white" >Konfirmasi Penghapusan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <div class="modal-body">
                 <?php echo e(csrf_field()); ?>

                 <?php echo e(method_field('DELETE')); ?>

                 <p class="text-center">Apakah anda yakin untuk menghapus pasien? Data yang sudah dihapus tidak bisa kembali</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Tidak, Batal</button>
                     <button type="button" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Ya, Hapus</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
<!--End Modal-->
    <div class="card shadow mb-4">
    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Pasien</h6>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($data->id); ?>)" data-target="#DeleteModal" class="btn btn-sm btn-icon-split btn-danger">
                        <span class="icon"><i class="fa  fa-trash" style="padding-top: 4px;"></i></span><span class="text">Hapus</span>
                    </a>
                </div>
                <div class="card-body">
                <div class="card-body">
                    <code class="mb-6">Data terakhir diperbaharui <?php echo e(hitung_usia($data->updated_time)); ?> yang lalu</code>
                    <form class="user" action="/pasien/edit/update/" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="Nama_Lengkap" placeholder="Nama Lengkap" value="<?php echo e($data->nama); ?>" >
                            </div>
                          <div class="col-sm-2">
                            <label for="Tanggal_Lahir" align="center" class ="form-text">Tanggal lahir :</label>
                          </div>
                          <div class="col-sm-4">
                            <input type="date" class="form-control " name="Tanggal_Lahir" placeholder="Tanggal lahir" value="<?php echo e($data->tgl_lhr); ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control " name="Alamat" placeholder="Alamat" value="<?php echo e($data->alamat); ?>">
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control " name="Pekerjaan" placeholder="Pekerjaan" value="<?php echo e($data->pekerjaan); ?>">
                          </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control " name="no_handphone" placeholder="Nomer Handphone" value="<?php echo e($data->hp); ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <select class="form-control " name="Pendidikan_terakhir" placeholder="Pendidikan terakhir" value="<?php echo e($data->pendidikan); ?>">
                                <option value=""<?php echo e($data->pendidikan == '' ? 'selected' : ''); ?> disabled>Pendidikan Terakhir</option>
                                <option value="Tidak Sekolah" <?php echo e($data->pendidikan == 'Tidak Sekolah' ? 'selected' : ''); ?>>Tidak Sekolah</option>
                                <option value="SD" <?php echo e($data->pendidikan == 'SD' ? 'selected' : ''); ?>>SD</option>
                                <option value="SMP"<?php echo e($data->pendidikan == 'SMP' ? 'selected' : ''); ?>>SMP</option>
                                <option value="SMA" <?php echo e($data->pendidikan == 'SMA' ? 'selected' : ''); ?>>SMA</option>
                                <option value="Perguruan Tinggi" <?php echo e($data->pendidikan == 'Perguruan Tinggi' ? 'selected' : ''); ?>>Perguruan Tinggi</option>
                            </select>    
                          </div>
                          <div class="col-sm-6">
                            <select class="form-control " name="Jenis_Kelamin" placeholder="Jenis Kelamin">
                                <option value="" <?php echo e($data->jk == '' ? 'selected' : ''); ?> disabled>Jenis Kelamin</option>
                                <option value="Laki-laki"<?php echo e($data->jk == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                <option value="Perempuan"<?php echo e($data->jk == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>

                            </select>
                          </div>
                        </div>
                            <div class="form-group">
                                <input type="text" class="form-control " name="no_bpjs" placeholder="Nomer BPJS (Tidak Wajib)" value="<?php echo e($data->no_bpjs); ?>" >
                            </div>
                            <div class="form-group">
                                <textarea class="form-control " name="alergi" placeholder="Daftar Alergi (Tidak Wajib)"><?php echo e($data->alergi); ?></textarea>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
  <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("pasien.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/edit-pasien.blade.php ENDPATH**/ ?>