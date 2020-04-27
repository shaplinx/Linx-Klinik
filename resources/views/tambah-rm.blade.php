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
    <div class="card shadow mb-4">
    
                <!-- Card Header - Accordion -->
                <a href="#PilihPasien" class="d-block card-header py-3 {{$cont['col']}}" data-toggle="collapse" role="button" aria-expanded="{{$cont['aria']}}" aria-controls="PilihPasien">
                  <h6 class="m-0 font-weight-bold text-primary">Pilih pasien</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse {{$cont['show']}}" id="PilihPasien" style="">
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
                  @foreach ($pasiens as $pasien)
                    <tr>
                      <td>{{str_pad($pasien->id, 4, '0', STR_PAD_LEFT)  }}</td>
                      <td>{{ $pasien->nama }}</td>
                      <td>{{ $pasien->hp }}</td>
                      <td width="120px">
                        <a href="{{route('rm.tambah.id',$pasien->id)}}" class="btn btn-primary btn-sm btn-icon-split">
                        <span class="icon text-white-50">
                        <i style="padding-top:4px"class="fas fa-check"></i>
                        </span>
                        <span class="text">Pilih</span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
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
                    @if (isset($idens))
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
    <div class="card shadow mb-4">
                <a href="#tambahrm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahrm">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Rekam Medis</h6></a>
                <div class="collapse show" id="tambahrm">
                <div class="card-body">
                    <form class="user" action="{{route('rm.simpan')}}" method="post">
                    {{csrf_field()}}
                    @foreach ($idens as $iden)
                    <input type="hidden" name="idpasien" value="{{ $iden->id }}">
                    @endforeach
                        <div class="form-group row">
                            <label for="dokter">Dokter Pemeriksa</label>
                            <select class="form-control " name="dokter" {{(Auth::user()->admin !== 1) ? (Auth::user()->profesi !== "Staff") ? 'disabled="true"' : '' : ''}}>
                            @foreach ($dokters as $dokter)
                            <option value ="{{$dokter->id}}" {{$dokter->id === Auth::user()->id ? 'selected' : ''}}>dr. {{get_value('users',$dokter->id,'name') }}</option>
                            @endforeach
                            </select>
                        </div>   
                        <div class="form-group row">
                            <label for="keluhan-utama">Keluhan Utama</label>
                            <input type="text" class="form-control " name="keluhan_utama" value="{{Request::old('keluhan_utama')}}" required>
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
                            
                            <select class="form-control "id="penunjang" name="penunjang" {{Auth::user()->profesi !== "Dokter" ? 'disabled="true"': ''}}>
                                <option value="" selected disabled>Pilih satu</option>
                                @foreach ($labs as $lab)
                                <option satuan="{{$lab->satuan}}" value="{{$lab->id}}">{{$lab->nama}}</option>
                                @endforeach
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
                            <input type="text" class="form-control " name="diagnosis" {{Auth::user()->profesi !== "Dokter" ? 'readonly': ''}}>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="reseplist">Resep</label>
                        `   </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 mb-0 mb-sm-0">
                            <select class="form-control " name="reseplist" id="reseplist" {{Auth::user()->profesi !== "Dokter" ? 'disabled="true"': ''}}>
                                <option value="" selected disabled>Pilih satu</option>
                                @foreach ($obats as $obat)
                                <option value="{{$obat->id}}">{{$obat->nama_obat}} {{$obat->sediaan}} {{$obat->dosis}}{{$obat->satuan}}</option>
                                @endforeach
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
                        @foreach ($idens as $iden)
                            <a href= "{{route('rm.list',$iden->id)}}" class="btn btn-danger btn-block" name="simpan">
                                 <i class="fas fa-arrow-left fa-fw"></i> kembali
                            </a>
                        @endforeach
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
                    @endif
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
@endsection