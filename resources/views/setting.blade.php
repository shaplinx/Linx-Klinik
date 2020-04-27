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
    @foreach ($datas as $data)
    <div class="card shadow mb-4">
                <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Formulir Pengaturan</h6>
                </div>
                <div class="card-body">
                <div class="card-body">
              
                    <form class="user" action="{{route('pengaturan.simpan')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH') }}
                        <div class="form-group row">
                            <h7 class="m-10 font-weight-bold font-italic text-secondary">Pengaturan Umum</h7>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Nama Klinik</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="nama_klinik" value="{{ $data->n_Klinik }}" placeholder="Nama Obat" >
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Slogan</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control " name="slogan" value="{{ $data->Slogan }}" placeholder="Slogan" >
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Logo <p class="font-italic">(Hanya Kode FontAwesome)</p></label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="text" class="form-control" name="logo" value="{{ $data->logo }}" placeholder="Slogan" >
                            </div>                    
                         </div>
                           <div class="form-group row">
                           <div class="col-md-4 "></div>
                            
                            <div class="col-md-8 ">
                                <input type="checkbox" name="gambarbool" value="1" class="form-check-input" {{($data->gambarbool === 1) ? 'checked' : ''}}>
                                <label for="gambarbool" class="form-check-label"> Gunakan gambar sebagai logo?</label>
                            </div>
                           
                           </div>
                        <div class="form-group row">
                            <label   class="col-sm-4 col-form-label text-md-right">Logo Gambar</label>
                    
                        
                            <div class="col-md-8">
                                    <input type="file" id="gambar"  accept="image/*" name="gambar" id="avatarFile" aria-describedby="fileHelp" class="form-control-file">
                                    <small id="fileHelp" class="form-text text-muted">Mohon ukuran file tidak melebihi 2MB.</small>
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert"
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        @if ($data->gambar !== NULL)
                        <div class="form-group row">
                           <div class="col-md-4 "></div>
                            
                            <div class="col-md-8 ">
                                <input type="image" class ="img-fluid" id="image" value="{{$data->gambar}}" alt="Login" src="{{url('/storage/app/public/logo/'.$data->gambar)}}"</input>
                            </div>
                           
                           </div>
                        @endif
                        <div class="form-group row">
                            <h7 class="m-10 font-weight-bold font-italic text-secondary">Pengaturan Khusus</h7>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="nama_klinik">Jasa Dokter</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp. </div>
                                    </div>
                                <input type="text" class="form-control " name="jasa" value="{{ $data->jasa }}" placeholder="Jasa Dokter">
                                </div>
                            </div>
                         </div>
                        <div class="form-group row">
                            <div class="col-sm-8 mb-3 mb-sm-0">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <button type="submit" class="form-control btn-primary"><i class="fas fa-save"></i>  Simpan</i></button>
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
     

$( document ).ready(function() {
    $('.icp-auto').iconpicker();
});
  </script>

@endsection