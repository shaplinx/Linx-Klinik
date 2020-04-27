@extends('master')
 @section('judul_halaman')
        Tambah Pengguna Baru
    @endsection
    @section('deskripsi_halaman')
        Tambahkan pengguna baru dengan mengisi formulir berikut.
    @endsection
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">               
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Register') }}</h6>
    </div>
     <div class="card-body">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>
                
            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" >
                        @error('username')
                        <span class="invalid-feedback" role="alert"
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="profesi" class="col-md-4 col-form-label text-md-right">Profesi</label>
                            <div class="col-md-6">
                                <select id="profesi" type="text" class="form-control @error('profesi') is-invalid @enderror" name="profesi" required>
                                    <option value="" selected>Pilih Profesi</option>
                                    <option value="Dokter" >Dokter</option>
                                    <option value="Staff">Staff</option>
                                    @error('profesi')
                                    <span class="invalid-feedback" role="alert"
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </select>
                            </div>
                        </div>    
                        
                        <div class="form-group row">
                            <label   class="col-md-4 col-form-label text-md-right">Jadikan Admin</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input id="admin" type="radio" class="form-check-input" value="0" name="admin" checked><label class="form-check-label" for="admin"> Tidak</label>
                                </div>
                                <div class="form-check">
                                    <input id="admin" type="radio" class="form-check-input" value="1" name="admin"><label class="form-check-label" for="admin"> Ya</label>
                                </div> 
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label   class="col-md-4 col-form-label text-md-right">Foto Profil</label>
                        
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
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
