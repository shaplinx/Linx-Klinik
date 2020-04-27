@extends('master')
@foreach ($metadatas as $metadata)
    @section('judul_halaman')
        {{ $metadata->Judul }}
    @endsection
    @section('deskripsi_halaman')
        {{ $metadata->Deskripsi }}
    @endsection
@endforeach
@section('konten')
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
                 {{ csrf_field() }}
                 {{ method_field('DELETE') }}
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
                    @foreach ($idens as $iden)
                    <form class="user" action="">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="Nama_Lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control " name="Nama_Lengkap" value="{{$iden->nama}}" readonly>
                            </div>
                          <div class="col-sm-6">
                            <label for="Tanggal_Lahir">Tanggal lahir :</label>
                            <input type="date" class="form-control " name="Tanggal_Lahir"  value="{{$iden->tgl_lhr}}" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="Alamat">Alamat</label>
                                <input type="text" class="form-control " name="Alamat"  value="{{$iden->alamat}}" readonly>   
                            </div>
                            <div class="col-sm-6">
                                <label for="jk">Jenis Kelamin</label>
                                <input type="text" class="form-control " name="jk" value="{{$iden->jk}}" readonly> 
                              </div>
                            </div>
                        
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="no_bpjs">No. BPJS</label>
                                <input type="text" class="form-control " name="no_bpjs" value="{{$iden->no_bpjs}}" readonly>
                          </div>
                          <div class="col-sm-6">
                            <label for="no_handphone">No. Handphone</label>
                            <input type="text" class="form-control " name="no_handphone"  value="{{$iden->hp}}" readonly>
                          </div>
                        </div>
                    </form>
                    @endforeach
                
                </div>
                </div>
    </div>
    @foreach ($datas as $data)
    <div class="card shadow mb-4">
                <a href="#tambahrm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahrm">
                  <h6 class="m-0 font-weight-bold text-primary">Rekam Medis pasien</h6> </a> 
</a>
                <div class="collapse show" id="tambahrm">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-12" align="right">
                    <a href="{{route('rm.edit', $data->id)}}" class="btn btn-warning btn-icon-split">
                        <span class="icon">
                        <i style="padding-top:4px"class="fas fa-pen"></i>
                        </span>
                        <span class="text">Edit</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal" class="btn btn-icon-split btn-danger">
                        <span class="icon"><i class="fa  fa-trash" style="padding-top: 4px;"></i></span><span class="text">Hapus Rekam Medis</span></a>
                    </div>
                </div>
                    <form class="user" action="{{route('rm.update')}}" method="post">
                    {{csrf_field()}}
                    
                    <input type="hidden" name="idpasien" value="{{ $data->idpasien }}">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group row">
                            <div class="col-sm-3 text-md-right">
                                <label for="keluhan-utama"><strong>Tanggal Periksa</strong></label>
                            </div>
                            <div class="col-sm-1 text-md-center">
                                :
                            </div>
                            <div class="col-sm-8">
                                <p class="text-md-left">{{ format_date($data->created_time) }}</p>
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
                               <p class="text-md-left">dr. {{ get_value('users',$data->dokter,'name') }}</p>
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
                                <p class="text-md-left">{{ $data->ku }}</p>
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
                                <p class="text-md-left">{{ $data->anamnesis}}</p>
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
                                <p class="text-md-left">{{ $data->pxfisik}}</p>
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
                                @if ($data->lab != NULL)
                                @for ($i=0;$i<$num['lab'];$i++) <li> {{get_value('lab',array_keys($data->labhasil)[$i],'nama')}} : {{$data->labhasil[array_keys($data->labhasil)[$i]]}} {{get_value('lab',array_keys($data->labhasil)[$i],'satuan')}} </li>
                                
                                @endfor
                                @endif
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
                                <p class="text-md-left">{{ $data->diagnosis }}</p>
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
                            @if ($data->resep != NULL)                          
                                @for ($i=0;$i<$num['resep'];$i++)
                                    <li class="text-md-left">{{get_value('obat',array_keys($data->allresep)[$i],'nama_obat')}} {{get_value('obat',array_keys($data->allresep)[$i],'sediaan')}} {{get_value('obat',array_keys($data->allresep)[$i],'dosis')}}  {{$data->allresep[array_keys($data->allresep)[$i]]}}</li>
                                @endfor
                               @endif
                            </div>
                             
                        </div>
            
                        
                        
                        <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        @foreach ($idens as $iden)
                            <a href= "{{route('rm.list',$iden->id)}}" class="btn btn-danger btn-block" name="simpan">
                                 <i class="fas fa-arrow-left fa-fw"></i> kembali
                            </a>
                        @endforeach
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">

                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <a href="javascript:;" data-toggle="modal" onclick="print()"  class="btn btn-primary btn-block">
                            <span class="icon"><i class="fa  fa-print" ></i></span><span class="text"> Cetak</span></a>
                        </div> 
                    </form>
                    @endforeach
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
         var url = '{{ route("rm.destroy", ":id") }}';
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
@endsection