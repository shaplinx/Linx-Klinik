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
                 <p class="text-center">Apakah anda yakin untuk menghapus pasien? Data yang sudah dihapus tidak bisa kembali</p>
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
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">               
            <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
            <a href="{{route('pasien.tambah')}}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm"></i> Tambah Pasien</a> 
        </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No RM</th>
                      <th>Nama Lengkap</th>
                      <th>Usia</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No. Hp</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No RM</th>
                      <th>Nama Lengkap</th>
                      <th>Usia</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No. Hp</th>
                      <th>Tindakan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach ($pasiens as $pasien)
                    <tr>
                      <td width="10%">{{str_pad($pasien->id, 4, '0', STR_PAD_LEFT)  }}</td>
                      <td>{{ $pasien->nama }}</td>
                      <td>{{ hitung_usia($pasien->tgl_lhr) }}</td>
                      <td>{{ $pasien->jk }}</td>
                      <td class="text-truncate" style="max-width: 150px;">{{ $pasien->alamat }}</td>
                      <td>{{ $pasien->hp }}</td>
                      <td>
                        <a href ="{{route('rm.list', $pasien->id) }}" title="Buka RM" class="btn btn-circle btn-primary">
                            <i class="fas fa-file"></i>
                        </a>
                        <a href ="{{ route('pasien.edit', $pasien->id) }}" title="Edit" class="btn btn-circle btn-warning">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$pasien->id}})" data-target="#DeleteModal" class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("pasien.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>
@endsection