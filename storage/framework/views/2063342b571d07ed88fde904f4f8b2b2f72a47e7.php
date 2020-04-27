
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

                 <p class="text-center">Apakah anda yakin untuk menghapus Rekam Medis? Data yang sudah dihapus tidak bisa kembali</p>
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
    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card shadow mb-4">
                <a href="#tambahrm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahrm">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Rekam Medis</h6> </a> 
</a>
                <div class="collapse show" id="tambahrm">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($data->id); ?>)" data-target="#DeleteModal" class="btn btn-icon-split btn-danger">
                        <span class="icon"><i class="fa  fa-trash" style="padding-top: 4px;"></i></span><span class="text">Hapus Rekam Medis</span></a>
                    </div>
                </div>
                    <form class="user" action="<?php echo e(route('rm.update')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    
                    <input type="hidden" name="idpasien" value="<?php echo e($data->idpasien); ?>">
                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                        <div class="form-group row col-sm-12">
                            <label for="dokter">Dokter Pemeriksa</label>
                            <select class="form-control " name="dokter" <?php echo e((Auth::user()->admin !== 1) ? 'disabled="true"' : ''); ?>>
                            <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value ="<?php echo e($dokter->id); ?>" <?php echo e($dokter->id === $data->dokter ? 'selected' : ''); ?>>dr. <?php echo e(get_value('users',$dokter->id,'name')); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>   
                        <div class="form-group row col-sm-12">
                            <label for="keluhan-utama">Keluhan Utama</label>
                            <input type="text" class="form-control " name="keluhan_utama" value="<?php echo e($data->ku); ?>" required>
                        </div>
                        <div class="form-group row col-sm-12  ">
                            <label for="anamnesis">Anamnesis</label>
                            <textarea type="date" class="form-control " name="anamnesis"  required><?php echo e($data->anamnesis); ?></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="pemeriksaan_fisik">Pemeriksaan Fisik</label>
                            <textarea type="date" class="form-control " name="px_fisik" required><?php echo e($data->pxfisik); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="penunjang">Pemeriksaan Penunjang</label>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                            
                            <select num="<?php echo e($num['lab']); ?>" class="form-control "id="penunjang" name="penunjang" >
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
                            <table id="dynamicTable" width="75%">
                                <?php if($data->lab != NULL): ?>
                                <?php for($i=0;$i<$num['lab'];$i++): ?>
                                <tr>
                                    <td><input type="hidden" name="lab[<?php echo e($i); ?>][id]" value="<?php echo e(array_keys($data->labhasil)[$i]); ?>" class="form-control" readonly></td>
                                    <td width="30%"><input type="text" name="lab[<?php echo e($i); ?>][nama]" value="<?php echo e(get_value('lab',array_keys($data->labhasil)[$i],'nama')); ?>" class="form-control" readonly></td>
                                    <td width="10%"><input type="text" name="lab[<?php echo e($i); ?>][hasil]" value="<?php echo e($data->labhasil[array_keys($data->labhasil)[$i]]); ?>" placeholder="Hasil" class="form-control" required>
                                    <td width=10%"><input class="form-control" value='<?php echo e(get_value('lab',array_keys($data->labhasil)[$i],'satuan')); ?>' readonly></td></td>
                                    <td><button type="button" class="btn btn-danger remove-pen">Hapus</button></td>
                                </tr>
                                <?php endfor; ?>
                                <?php endif; ?>
                                </table>
                                
                        </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="diagnosis">Diagnosis</label>
                            <input type="text" class="form-control " name="diagnosis" value="<?php echo e($data->diagnosis); ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="reseplist">Resep</label>
                        `   </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 mb-0 mb-sm-0">
                            <select num="<?php echo e($num['resep']); ?>" class="form-control " name="reseplist" id="reseplist" >
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
                            <table width="75%" id="reseps">
                                <?php if($data->resep != NULL): ?>
                                <?php for($i=0;$i<$num['resep'];$i++): ?>
                                <tr>
                                    <td><input type="hidden" name="resep[<?php echo e($i); ?>][id]" value="<?php echo e(array_keys($data->allresep)[$i]); ?>" class="form-control" readonly></td>
                                    <td width="30%"><input type="text" name="resep[<?php echo e($i); ?>][nama]" value="<?php echo e(get_value('obat',array_keys($data->allresep)[$i],'nama_obat')); ?> <?php echo e(get_value('obat',array_keys($data->allresep)[$i],'sediaan')); ?> <?php echo e(get_value('obat',array_keys($data->allresep)[$i],'dosis')); ?> <?php echo e(get_value('obat',array_keys($data->allresep)[$i],'satuan')); ?>" class="form-control" readonly></td>
                                    <td width="10%"><input type="text" name="resep[<?php echo e($i); ?>][jumlah]" value="<?php echo e($data->jum[$i]); ?>" placeholder="Jumlah" class="form-control" required></td>
                                    <td width ="30%"><input type="text" name="resep[<?php echo e($i); ?>][aturan]" value="<?php echo e($data->allresep[array_keys($data->allresep)[$i]]); ?>" placeholder="Aturan" class="form-control" required></td>
                                    <td><button type="button" class="btn btn-danger remove-pen">Hapus</button></td>
                                </tr>
                                <?php endfor; ?>
                                <?php endif; ?>
                            </table>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </script>
<script type="text/javascript">
   
    var i = $("#penunjang").attr('num');
    var a = $("#reseplist").attr('num');
       
    function addpenunjang() {
        
        
        var pen= $("#penunjang option:selected").html();
        var penid= $("#penunjang").val();
        var satuan =$("#penunjang option:selected").attr('satuan');
        if (penid !== null) {
            //code
            $("#dynamicTable").append('<tr><td><input type="hidden" name="lab['+i+'][id]" value="'+penid+'" class="form-control" readonly></td><td><input type="text" name="lab['+i+'][nama]" value="'+pen+'" class="form-control" readonly></td><td><input type="text" name="lab['+i+'][hasil]" placeholder="Hasil" class="form-control" required><td width=20%"><input class="form-control" value='+satuan+' readonly></td></td><td><button type="button" class="btn btn-danger remove-pen">Hapus</button></td></tr>');
        }
        ++i;
    };
    
     function addresep() {
        
        var res= $("#reseplist option:selected").html();
        var resid= $("#reseplist").val();
        if (resid !== null) {
            //code
            $("#reseps").append('<tr><td><input type="hidden" name="resep['+a+'][id]" value="'+resid+'" class="form-control" readonly></td><td><input type="text" name="resep['+a+'][nama]" value="'+res+'" class="form-control" readonly></td><td><input type="text" name="resep['+a+'][jumlah]" placeholder="Jumlah" class="form-control" required><td><input type="text" name="resep['+a+'][aturan]" placeholder="Aturan pakai" class="form-control" required></td><td><button type="button" class="btn btn-danger remove-res">Hapus</button></td></tr>');
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
    
                      <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '<?php echo e(route("rm.destroy", ":id")); ?>';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/edit-rm.blade.php ENDPATH**/ ?>