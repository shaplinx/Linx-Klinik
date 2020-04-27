
<?php $__currentLoopData = $metadatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metadata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startSection('judul_halaman'); ?>
        <?php echo e($metadata->Judul); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('deskripsi_halaman'); ?>
        <?php echo e($metadata->Deskripsi); ?>

    <?php $__env->stopSection(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('konten'); ?>
        <div class="card shadow mb-4" id="print1">
                <a href="#Identitas" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="Identitas">
                  <h6 class="m-0 font-weight-bold text-primary">Identitas Pasien</h6></a>
                <div class="collapse show" id="Identitas">
                <div class="card-body">
                    <?php $__currentLoopData = $idens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form class="user" action="">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="Nama_Lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control " name="Nama_Lengkap" value="<?php echo e($iden->nama); ?>" readonly>
                            </div>
                          <div class="col-sm-6">
                            <label for="Tanggal_Lahir">Tanggal lahir :</label>
                            <input type="date" class="form-control " name="Tanggal_Lahir"  value="<?php echo e($iden->tgl_lhr); ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="Alamat">Alamat</label>
                                <input type="text" class="form-control " name="Alamat"  value="<?php echo e($iden->alamat); ?>" readonly>   
                            </div>
                            <div class="col-sm-6">
                                <label for="jk">Jenis Kelamin</label>
                                <input type="text" class="form-control " name="jk" value="<?php echo e($iden->jk); ?>" readonly> 
                              </div>
                            </div>
                        
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="no_bpjs">No. BPJS</label>
                                <input type="text" class="form-control " name="no_bpjs" value="<?php echo e($iden->no_bpjs); ?>" readonly>
                          </div>
                          <div class="col-sm-6">
                            <label for="no_handphone">No. Handphone</label>
                            <input type="text" class="form-control " name="no_handphone"  value="<?php echo e($iden->hp); ?>" readonly>
                          </div>
                        </div>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </div>
                </div>
    </div>
    <div id="print" class="card shadow mb-4">
                <a href="#tambahrm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahrm">
                  <h6 class="m-0 font-weight-bold text-primary">Tagihan Kunjungan Pasien</h6></a>
                <div class="collapse show" id="tambahrm">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                            <?php $__currentLoopData = $idens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h6 class="mb-3">Kepada:</h6>
                            <div>
                                <strong><?php echo e($iden->nama); ?></strong>
                            </div>
                                <div>Usia : <?php echo e(hitung_usia($iden->tgl_lhr)); ?></div>
                                <div>Alamat : <?php echo e($iden->alamat); ?></div>
                                <div>No. Hp: <?php echo e($iden->hp); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
        
                    </div>
                            <div class="table-responsive-sm">
                            <table class="table table-striped">
                            <thead>
                            
                            <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th class="right">Harga Satuan</th>
                              <th class="center">Kuantitas</th>
                            <th class="right">Sub Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php for($n=0;$n<sizeof($items);$n++): ?>
                            <tr>
                            <td class="center"><?php echo e($n + 1); ?></td>
                            <td class="left strong"><?php echo e($item=array_keys($items)[$n]); ?></td>
                                <?php for($i=0;$i<3;$i++): ?>
                                    <?php if($i != 1): ?>
                                        <td class="center"><?php echo e(formatrupiah($items[$item][$i])); ?></td>
                                    <?php else: ?>
                                        <td class="center"><?php echo e($items[$item][$i]); ?></td>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </tr>
                            <?php endfor; ?>
                            <tr>
                            <th class="center"></th>
                            <th>Jumlah Harga</th>
                            <th class="right"></th>
                              <th class="center"></th>
                            <th class="right"><?php echo e(formatrupiah(jumlah_harga($items))); ?>

                            </th>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <a href="<?php echo e(route('rm')); ?>"   class="btn btn-block btn-danger">
                                    <span class="icon"><i class="fa  fa-arrow-left" ></i></span><span class="text"> Kembali</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="javascript:;" data-toggle="modal" onclick="print()" data-target="#DeleteModal" class="btn btn-primary btn-block">
                                    <span class="icon"><i class="fa  fa-print" ></i></span><span class="text"> Cetak</span></a>
                                </div>

                                                            
                     </div>   
                </div>
                    </div>
                </div>
                   
    <script>
    $(document).ready( function () {
  var table = $('#pasien').DataTable( {
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
  } )
} );

function print() {
    $('#print').printThis();
}
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/tagihan.blade.php ENDPATH**/ ?>