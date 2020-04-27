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
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Formulir Obat Baru</h6>
                </div>
                <div class="card-body">
                    <form class="user" action="{{route('obat.simpan')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="n_obat" placeholder="Nama Obat" >
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select class="form-control " name="sediaan" placeholder="Bentuk Sediaan">
                                      <option value="" selected disabled>Sediaan Obat</option>
                                      <option value="Tablet">Tablet</option>
                                      <option value="Kapsul">Kapsul</option>
                                      <option value="Syrup">Syrup</option>
                                      <option value="Ampul">Ampul</option>
                                      <option value="Flask">Flask</option>
                                  </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                 <input type="text" class="form-control " name="dosis" placeholder="Dosis Obat" > 
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <select class="form-control " name="satuan" placeholder="satuan">
                                      <option value="" selected disabled>Satuan</option>
                                      <option value="g">g</option>
                                      <option value="mg">mg</option>
                                      <option value="mcg">mcg</option>
                                      <option value="IU">IU</option>
                                      <option value="mg/5ml">mg/5ml</option>
                                  </select>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-hashtag fa-fw"></i></div>
                                    </div>
                                <input type="text" class="form-control " name="stok"  placeholder="Jumlah Stok Obat">
                            </div></div>
                            <div class="col-sm-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-money-bill-wave fa-fw"></i></div>
                                    </div>
                                <input type="text" class="form-control " name="harga"  placeholder="Harga Obat">
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
                </div>
    </div>
@endsection