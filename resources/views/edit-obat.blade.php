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
                 <p class="text-center">Apakah anda yakin untuk menghapus obat? Data yang sudah dihapus tidak bisa kembali</p>
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
    @foreach ($datas as $data)
    <div class="card shadow mb-4">
                <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Obat</h6>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal" class="btn btn-sm btn-icon-split btn-danger">
                        <span class="icon"><i class="fa  fa-trash" style="padding-top: 4px;"></i></span><span class="text">Hapus</span>
                    </a>
                </div>
                <div class="card-body">
                <div class="card-body">
              
                    <code class="mb-6">Data terakhir diperbaharui {{ hitung_usia($data->updated_time) }} yang lalu</code>
                    <form class="user" action="{{route('obat.update')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="n_obat" value="{{ $data->nama_obat }}" placeholder="Nama Obat" >
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select class="form-control " name="sediaan" placeholder="Bentuk Sediaan">
                                      <option value="" disabled>Sediaan Obat</option>
                                      <option value="Tablet" {{ $data->sediaan == 'Tablet' ? 'selected' : ''  }}>Tablet</option>
                                      <option value="Kapsul" {{ $data->sediaan == 'Kapsul' ? 'selected' : ''  }}>Kapsul</option>
                                      <option value="Syrup" {{ $data->sediaan == 'Syrup' ? 'selected' : ''  }}>Syrup</option>
                                      <option value="Ampul" {{ $data->sediaan == 'Ampul' ? 'selected' : ''  }}>Ampul</option>
                                      <option value="Flask" {{ $data->sediaan == 'Flask' ? 'selected' : ''  }}>Flask</option>
                                  </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                 <input type="text" class="form-control " name="dosis" value="{{ $data->dosis }}" placeholder="Dosis Obat" > 
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select class="form-control " name="satuan" placeholder="satuan">
                                      <option value="" disabled>Satuan</option>
                                      <option value="g" {{ $data->satuan == 'g' ? 'selected' : ''  }}>g</option>
                                      <option value="mg" {{ $data->satuan == 'mg' ? 'selected' : ''  }}>mg</option>
                                      <option value="mcg" {{ $data->satuan == 'mcg' ? 'selected' : ''  }}>mcg</option>
                                      <option value="IU"{{ $data->satuan == 'IU' ? 'selected' : ''  }}>IU</option>
                                      <option value="mg/5ml" {{ $data->satuan == 'mg/5ml' ? 'selected' : ''  }}>mg/5ml</option>
                                  </select>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-hashtag fa-fw"></i></div>
                                    </div>
                                <input type="text" class="form-control " name="stok" value="{{ $data->stok }}" placeholder="Jumlah Stok Obat">
                            </div></div>
                            <div class="col-sm-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-money-bill-wave fa-fw"></i></div>
                                    </div>
                                <input type="text" class="form-control " name="harga" value="{{ $data->harga }}" placeholder="Harga Obat">
                            </div></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <a href="{{route('obat')}}" class="btn btn-danger btn-block btn">
                                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan" >
                                    <i class="fas fa-save fa-fw"></i> Simpan
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-warning btn-block" name ="simpan" value="simpan_baru">
                                    <i class="fas fa-plus fa-fw"></i> Simpan Dan Buat Baru
                                </button>
                            </div>    
                            </div>                      
                    </form>
                    @endforeach
                </div>
              </div>
                
                  <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("obat.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>
@endsection