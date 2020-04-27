@extends('master')
 @section('judul_halaman')
        Edit Profil
    @endsection
    @section('deskripsi_halaman')
        Lakukan pengeditan profil dengan mengisi form berikut.
    @endsection
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">               
        <h6 class="m-0 font-weight-bold text-primary">Edit Profil</h6>
    </div>
     <div class="card-body">
        <div class="row">
        <div class="col-md-4 align-items-center">
            <div class="row justify-content-center">
                <div class="profile-header-container">
                <div class="profile-header-img">
                    <img width="250px" class="rounded-circle img-fluid" src="{{url('/storage/avatars/'. Auth::user()->avatar)}}" 
                    <!-- badge -->
                    <div class="rank-label-container text-center">
                        <h4><span class="badge badge-dark">{{($user->profesi=="Dokter" ? 'dr. ':'')}}{{ ucwords($user->name)}}</span></h4>
                    </div>
                </div>
                </div>
        </div>
        </div>
        <div class="col-md-8">
        <form method="POST" action="{{ route('profile.simpan') }}" enctype="multipart/form-data">
        @method('patch')
            @csrf
        
            <div class="form-group row">
                <input type="hidden" name ="id" value="{{$user->id}}">
                <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>
                <div class="col-md-8">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>
                
            <div class="form-group row">
                <label for="username" class="col-md-2 col-form-label text-md-right">Username</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username',$user->username) }}" required autocomplete="name" >
                        @error('username')
                        <span class="invalid-feedback" role="alert"
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                  Ganti Password
                                </button>
                                  
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Ganti Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi Password</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="btnClear" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Peubahan</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profesi" class="col-md-2 col-form-label text-md-right">Profesi</label>
                            <div class="col-md-6">
                                <select id="profesi" type="text" class="form-control @error('profesi') is-invalid @enderror" name="profesi" required>
                                    <option value="Dokter" {{$user->profesi == "Dokter" ? 'selected':''}} >Dokter</option>
                                    <option value="Staff" {{$user->profesi == "Staff" ? 'selected':''}}>Staff</option>
                                    @error('profesi')
                                    <span class="invalid-feedback" role="alert"
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </select>
                            </div>
                        </div>    
                        @if (Auth::user()->admin == 1)
                        <div class="form-group row">
                            <label   class="col-md-2 col-form-label text-md-right">Jadikan Admin</label>
                        
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input id="admin" type="radio" class="form-check-input" value="0" name="admin" {{$user->admin == 0 ? 'checked':''}}><label class="form-check-label" for="admin"> Tidak</label>
                                </div>
                                <div class="form-check">
                                    <input id="admin" type="radio" class="form-check-input" value="1" name="admin" {{$user->admin == 1 ? 'checked':''}}><label class="form-check-label" for="admin"> Ya</label>
                                </div> 
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label   class="col-md-2 col-form-label text-md-right">Foto Profil</label>
                        
                            <div class="col-md-6">
                                    <input type="file" id="avatar"  accept="image/*" name="avatar" id="avatarFile" aria-describedby="fileHelp" class="form-control-file">
                                    <small id="fileHelp" class="form-text text-muted">Mohon ukuran file tidak melebihi 2MB.</small>
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert"
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Perbaharui
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script>
	$(document).ready(function(){
		$('#btnClear').click(function(){					
				$('#password-confirm').val('');
				$('#password').val('');					
		});
	});
</script> 
@endsection
