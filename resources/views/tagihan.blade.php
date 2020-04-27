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
        <div class="card shadow mb-4" id="print1">
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
    <div id="print" class="card shadow mb-4">
                <a href="#tambahrm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahrm">
                  <h6 class="m-0 font-weight-bold text-primary">Tagihan Kunjungan Pasien</h6></a>
                <div class="collapse show" id="tambahrm">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                            @foreach ($idens as $iden)
                                <h6 class="mb-3">Kepada:</h6>
                            <div>
                                <strong>{{$iden->nama}}</strong>
                            </div>
                                <div>Usia : {{hitung_usia($iden->tgl_lhr)}}</div>
                                <div>Alamat : {{$iden->alamat}}</div>
                                <div>No. Hp: {{$iden->hp}}</div>
                            @endforeach
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
                            
                            @for ($n=0;$n<sizeof($items);$n++)
                            <tr>
                            <td class="center">{{$n + 1}}</td>
                            <td class="left strong">{{$item=array_keys($items)[$n]}}</td>
                                @for ($i=0;$i<3;$i++)
                                    @if ($i != 1)
                                        <td class="center">{{formatrupiah($items[$item][$i])}}</td>
                                    @else
                                        <td class="center">{{$items[$item][$i]}}</td>
                                    @endif
                                @endfor
                            </tr>
                            @endfor
                            <tr>
                            <th class="center"></th>
                            <th>Jumlah Harga</th>
                            <th class="right"></th>
                              <th class="center"></th>
                            <th class="right">{{formatrupiah(jumlah_harga($items))}}
                            </th>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <a href="{{route('rm')}}"   class="btn btn-block btn-danger">
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

@endsection