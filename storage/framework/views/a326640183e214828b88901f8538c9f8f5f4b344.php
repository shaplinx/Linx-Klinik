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
                  <h6 class="m-0 font-weight-bold text-primary">Rekam Medis pasien</h6> </a> 
</a>
                <div class="collapse show" id="tambahrm">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-12" align="right">
                    <a href="<?php echo e(route('rm.edit', $data->id)); ?>" class="btn btn-warning btn-icon-split">
                        <span class="icon">
                        <i style="padding-top:4px"class="fas fa-pen"></i>
                        </span>
                        <span class="text">Edit</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo e($data->id); ?>)" data-target="#DeleteModal" class="btn btn-icon-split btn-danger">
                        <span class="icon"><i class="fa  fa-trash" style="padding-top: 4px;"></i></span><span class="text">Hapus Rekam Medis</span></a>
                    </div>
                </div>
                    <form class="user" action="<?php echo e(route('rm.update')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    
                    <input type="hidden" name="idpasien" value="<?php echo e($data->idpasien); ?>">
                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Tanggal Periksa</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            <div class="col-sm-8">
                                <p class="text-md-left"><?php echo e(format_date($data->created_time)); ?></p>
                            </div>
                        </div>
                            <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label ><strong>Dokter Pemeriksa</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            <div class="col-sm-8">
                               <p class="text-md-left">dr. <?php echo e(get_value('users',$data->dokter,'name')); ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Keluhan Utama</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            <div class="col-sm-8">
                                <p class="text-md-left"><?php echo e($data->ku); ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Anamnesis</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            <div class="col-sm-8">
                                <p class="text-md-left"><?php echo e($data->anamnesis); ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Pemeriksaan Fisix</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>    
                            <div class="col-sm-8">
                                <p class="text-md-left"><?php echo e($data->pxfisik); ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Pemeriksaan Penunjang</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            <div class="col-sm-8">
                                <?php if($data->lab != NULL): ?>
                                <?php for($i=0;$i<$num['lab'];$i++): ?> <li> <?php echo e(get_value('lab',array_keys($data->labhasil)[$i],'nama')); ?> : <?php echo e($data->labhasil[array_keys($data->labhasil)[$i]]); ?> <?php echo e(get_value('lab',array_keys($data->labhasil)[$i],'satuan')); ?> </li>
                                
                                <?php endfor; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Diagnosis</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            <div class="col-sm-8">
                                <p class="text-md-left"><?php echo e($data->diagnosis); ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Resep</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            
                            <div class="col-sm-8">
                            <?php if($data->resep != NULL): ?>                          
                                <?php for($i=0;$i<$num['resep'];$i++): ?>
                                    <li class="text-md-left"><?php echo e(get_value('obat',array_keys($data->allresep)[$i],'nama_obat')); ?> <?php echo e(get_value('obat',array_keys($data->allresep)[$i],'sediaan')); ?> <?php echo e(get_value('obat',array_keys($data->allresep)[$i],'dosis')); ?>  <?php echo e($data->allresep[array_keys($data->allresep)[$i]]); ?></li>
                                <?php endfor; ?>
                               <?php endif; ?>
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

                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <a href="javascript:;" data-toggle="modal" onclick="print()"  class="btn btn-primary btn-block">
                            <span class="icon"><i class="fa  fa-print" ></i></span><span class="text"> Cetak</span></a>
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
     function print() {
    $('#PrintRM').printThis();
    }
    </script>
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\SKlinik\resources\views/lihat-rm.blade.php ENDPATH**/ ?>