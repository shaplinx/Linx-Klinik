
<?php $__currentLoopData = $metadatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metadata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startSection('judul_halaman'); ?>
        <?php echo e($metadata->Judul); ?>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('deskripsi_halaman'); ?>
        <?php echo e($metadata->Deskripsi); ?>

    <?php $__env->stopSection(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('konten'); ?>
    <div class="card shadow mb-4">
    
                <!-- Card Header - Accordion -->
                <a href="#PilihPasien" class="d-block card-header py-3 <?php echo e($cont['col']); ?>" data-toggle="collapse" role="button" aria-expanded="<?php echo e($cont['aria']); ?>" aria-controls="PilihPasien">
                  <h6 class="m-0 font-weight-bold text-primary">Pilih pasien</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse <?php echo e($cont['show']); ?>" id="PilihPasien" style="">
                  <div class="card-body">
                   <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped" id="pasien" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No RM</th>
                      <th>Nama Lengkap</th>
                      <th>No. Hp</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No RM</th>
                      <th>Nama Lengkap</th>
                      <th>No. Hp</th>
                      <th>Tindakan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $__currentLoopData = $pasiens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e(str_pad($pasien->id, 4, '0', STR_PAD_LEFT)); ?></td>
                      <td><?php echo e($pasien->nama); ?></td>
                      <td><?php echo e($pasien->hp); ?></td>
                      <td width="120px">
                        <a href="/rm/tambah/<?php echo e($pasien->id); ?>" class="btn btn-primary btn-sm btn-icon-split">
                        <span class="icon text-white-50">
                        <i style="padding-top:4px"class="fas fa-check"></i>
                        </span>
                        <span class="text">Pilih</span>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
                  </div>
                </div>
           
   
        <div class="card shadow mb-4">
                <a href="#Identitas" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="Identitas">
                  <h6 class="m-0 font-weight-bold text-primary">Identitas Pasien</h6></a>
                <div class="collapse show" id="Identitas">
                <div class="card-body">
                    <?php if(isset($idens)): ?>
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
    <div class="card shadow mb-4">
                <a href="#tambahrm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahrm">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Rekam Medis</h6></a>
                <div class="collapse show" id="tambahrm">
                <div class="card-body">
                    <form class="user" action="<?php echo e(route('rm.simpan')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <?php $__currentLoopData = $idens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="idpasien" value="<?php echo e($iden->id); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group row">
                            <label for="dokter">Dokter Pemeriksa</label>
                            <select class="form-control " name="dokter" <?php echo e((Auth::user()->admin !== 1) ? (Auth::user()->profesi !== "Staff") ? 'disabled="true"' : '' : ''); ?>>
                            <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value ="<?php echo e($dokter->id); ?>" <?php echo e($dokter->id === Auth::user()->id ? 'selected' : ''); ?>>dr. <?php echo e(get_value('users',$dokter->id,'name')); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>   
                        <div class="form-group row">
                            <label for="keluhan-utama">Keluhan Utama</label>
                            <input type="text" class="form-control " name="keluhan_utama" value="<?php echo e(Request::old('keluhan_utama')); ?>" required>
                        </div>
                        <div class="form-group row">
                            <label for="anamnesis">Anamnesis</label>
                            <textarea type="date" class="form-control " name="anamnesis" required></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="pemeriksaan_fisik">Pemeriksaan Fisik</label>
                            <textarea type="date" class="form-control " name="px_fisik" required></textarea>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="penunjang">Pemeriksaan Penunjang</label>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            
                            <select class="form-control "id="penunjang" name="penunjang" <?php echo e(Auth::user()->profesi !== "Dokter" ? 'disabled="true"': ''); ?>>
                                <option value="" selected disabled>Pilih satu</option>
                                <?php $__currentLoopData = $labs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option satuan="<?php echo e($lab->satuan); ?>" value="<?php echo e($lab->id); ?>"><?php echo e($lab->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>  
                          </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" onclick="addpenunjang()" type="button" name="add" id="add" class="btn btn-success">Tambahkan</a>
                            </div>
                          </div>
                        <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <table id="dynamicTable"></table>
                        </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="diagnosis">Diagnosis</label>
                            <input type="text" class="form-control " name="diagnosis" <?php echo e(Auth::user()->profesi !== "Dokter" ? 'readonly': ''); ?>>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="reseplist">Resep</label>
                        `   </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 mb-0 mb-sm-0">
                            <select class="form-control " name="reseplist" id="reseplist" <?php echo e(Auth::user()->profesi !== "Dokter" ? 'disabled="true"': ''); ?>>
                                <option value="" selected disabled>Pilih satu</option>
                                <?php $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($obat->id); ?>"><?php echo e($obat->nama_obat); ?> <?php echo e($obat->sediaan); ?> <?php echo e($obat->dosis); ?><?php echo e($obat->satuan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>   
                          </div>
                            <div class="col-sm-3">
                                <a href="javascript:;" onclick="addresep()" type="button" name="addresep" id="addresep" class="btn btn-success">Tambahkan</a>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <table width="100%" id="reseps"></table>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <?php $__currentLoopData = $idens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href= "<?php echo e(route('rm.list',$iden->id)); ?>" class="btn btn-danger btn-block" name="simpan">
                                 <i class="fas fa-arrow-left fa-fw"></i> kembali
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan_edit" >
                                 <i class="fas fa-save fa-fw"></i> Simpan
                            </button>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <button type="submit" class="btn btn-success btn-block" name="simpan" value="simpan_tagihan" >
                                 <i class="fas fa-cart-plus fa-fw"></i> Simpan & Buat Tagihan
                            </button>
                        </div> 
                    </form>

                </div>
                </div>
                    <?php endif; ?>
    </div>
    <script>
    $(document).ready( function () {
  var table = $('#pasien').DataTable( {
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
  } )
} );
    </script>
<script type="text/javascript">
   
    var i = 0;
    var a = 0;
       
    function addpenunjang() {
        
        
        var pen= $("#penunjang option:selected").html();
        var penid= $("#penunjang").val();
        var satuan =$("#penunjang option:selected").attr('satuan');
        if (penid !== null) {
            //code
            $("#dynamicTable").append('<tr><td><input type="hidden" name="lab['+i+'][id]" value="'+penid+'" class="form-control" readonly></td><td width="30%"><input type="text" name="lab['+i+'][nama]" value="'+pen+'" class="form-control" readonly></td><td width="10%"><input type="text" name="lab['+i+'][hasil]" placeholder="Hasil" class="form-control" required><td width=10%"><input class="form-control" value='+satuan+' readonly></td></td><td><button type="button" class="btn btn-danger remove-pen">Hapus</button></td></tr>');
        }
        ++i;
    };
    
     function addresep() {
        
        
        var res= $("#reseplist option:selected").html();
        var resid= $("#reseplist").val();
        if (resid !== null) {
            //code
            $("#reseps").append('<tr><td><input type="hidden" name="resep['+a+'][id]" value="'+resid+'" class="form-control" readonly></td><td width="30%"><input type="text" name="resep['+a+'][nama]" value="'+res+'" class="form-control" readonly></td><td width ="10%"><input type="text" name="resep['+a+'][jumlah]" placeholder="Jumlah" class="form-control" required><td width="30%"><input type="text" name="resep['+a+'][aturan]" placeholder="Aturan pakai" class="form-control" required></td><td><button type="button" class="btn btn-danger remove-res">Hapus</button></td></tr>');
        }
        ++a;
    };
   
    $(document).on('click', '.remove-pen', function(){  
         $(this).parents('tr').remove();
    });
    
    $(document).on('click', '.remove-res', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/tambah-rm.blade.php ENDPATH**/ ?>