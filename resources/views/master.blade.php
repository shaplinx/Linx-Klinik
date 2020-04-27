<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('judul_halaman')</title>
  <!-- Custom fonts for this template-->

  <link href= "{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  
   <!-- Bootstrap core JavaScript-->
  <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script> 
  <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('/js/printThis.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    
  <script src="{{ URL::asset('js/fontawesome-iconpicker.js') }}"></script>
  <link href= "{{ URL::asset('css/fontawesome-iconpicker.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
     <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon {{(get_setting('gambarbool') !== 1) ? 'rotate-n-15' :''}}">
        @if (get_setting('gambarbool') === 1)
            <img src ="{{url('/storage/logo/'. get_setting('gambar'))}}" width=50px>
        @else
            <i class="fas {{get_setting('logo')}}"></i>
        @endif
          
        </div>
        <div class="sidebar-brand-text mx-3">{{get_setting('n_Klinik')}}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{set_menu('dashboard')}}">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Menu Utama
      </div>
      <!-- Nav Item - Pasien Collapse Menu -->
      <li class="nav-item {{ set_menu(['pasien', 'pasien.tambah', 'pasien.edit']) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-portrait"></i>
          <span>Pasien</span>
        </a>
        <div id="collapseTwo" class="collapse {{ set_show(['pasien', 'pasien.tambah', 'pasien.edit']) }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item {{ set_menu('pasien') }}" href="{{ route('pasien') }}">Daftar Pasien</a>
            <a class="collapse-item {{ set_menu('pasien.tambah') }}" href="{{ route('pasien.tambah') }}">Tambah Pasien</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Lab Collapse Menu -->
      <li class="nav-item {{ set_menu(['lab', 'lab.tambah', 'lab.edit']) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-tint"></i>
          <span>Labs</span>
        </a>
        <div id="collapseThree" class="collapse {{ set_show(['lab', 'lab.tambah', 'lab.edit']) }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item {{ set_menu('lab') }}" href="{{ route('lab') }}">Daftar Fasilitas Lab</a>
            <a class="collapse-item {{ set_menu('lab.tambah') }}" href="{{ route('lab.tambah') }}">Tambah Fasilitas Lab</a>
          </div>
        </div>
      </li>
              <!-- Nav Item - Lab Collapse Menu -->
      <li class="nav-item {{ set_menu(['obat', 'obat.tambah', 'obat.edit']) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-prescription-bottle-alt"></i>
          <span>Obat</span>
        </a>
        <div id="collapseFour" class="collapse {{ set_show(['obat', 'obat.tambah', 'obat.edit']) }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item {{ set_menu('obat') }} " href="{{ route('obat') }}">Daftar Obat</a>
            <a class="collapse-item" {{ set_menu('obat.tambah') }} href="{{ route('obat.tambah') }}">Tambah Obat</a>
          </div>
        </div>
      </li>
        
        <!-- Nav Item - RM Collapse Menu -->
      <li class="nav-item {{ set_menu(['rm', 'rm.tambah', 'rm.edit','rm.list','rm.lihat','rm.tambah.id','tagihan']) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-file-signature"></i>
          <span>Rekam Medis</span>
        </a>
        <div id="collapseFive" class="collapse {{ set_show(['rm', 'rm.tambah', 'rm.edit','rm.lihat','rm.tambah.id']) }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ set_menu(['rm']) }}" href="{{ route('rm') }}">Daftar RM</a>
            <a class="collapse-item {{ set_menu(['rm.tambah','rm.tambah.id']) }}" href="{{ route('rm.tambah') }}">Tambah RM</a>       
          </div>
        </div>
      </li>
        

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Tambahan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ set_menu(['login', 'register', 'user','profile.edit','profile.edit.admin','profile.edit']) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user"></i>
          <span>Pengguna</span>
        </a>
        <div id="collapsePages" class="collapse {{ set_show(['login', 'register', 'user','profile.edit','profile.edit.admin','profile.edit']) }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ set_menu(['user']) }}" href="{{route('user')}}">Daftar Pengguna</a>
            <a class="collapse-item {{ set_menu(['register']) }}" href="{{route('register')}}">Tambah Pengguna Baru</a>
            <a class="collapse-item {{ set_menu(['profile.edit']) }}" href="{{route('profile.edit')}}">Edit Profile</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item {{ set_menu(['pengaturan']) }}">
        <a class="nav-link" href="{{route('pengaturan')}}">
          <i class="fas fa-fw fa-sliders-h"></i>
          <span>Pengaturan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

     <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <label class="form-control bg-light border-0 small"  aria-label="Search" aria-describedby="basic-addon2" readonly><p class="text-center">{{get_setting('Slogan')}}</p>
              <div class="input-group-append">
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            
            @if (Auth::user()->admin === 1)
            <!-- Nav Item - Admin -->
            <li class="nav-item">
              <a class="nav-link" href="#" id="messagesDropdown" style="padding: 5px;">
                <span class="badge badge-success">Admin</span>
              </a>
            @endif
                
            <!-- Nav Item - Profesi -->
            <li class="nav-item">
              <a class="nav-link" href="#" id="messagesDropdown" style="padding: 2px;">
                <span class="badge badge-{{Auth::user()->profesi ? 'primary' :'warning'}}">{{Auth::user()->profesi}}</span>
              </a>    
            </li>
              
             <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                
                
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{count(cek_stok_warning(10))}}</span>
               
              </a>
                @if ($notif=cek_stok_warning(10))
                @if (count($notif) > 0)
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                @foreach ($notif as $id => $pesan)
                <a class="dropdown-item d-flex align-items-center" href="{{route('obat.edit',$id)}}">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-capsules text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">{{$pesan}}</span>
                  </div>
                </a>
                    @endforeach
              </div>
            @endif
        @endif
            </li> 
                
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ucfirst(Auth::user()->name) }}</span>
                <img width="60px" class="img-profile rounded-circle" src="{{url('/storage/avatars/'. Auth::user()->avatar)}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('profile.edit')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                @if (Auth::user()->admin == 1)
                    <a class="dropdown-item" href="{{route('pengaturan')}}">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Pengaturan
                @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid" id="PrintRM">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">@yield('judul_halaman')</h1>
          <p class="mb-4">@yield('deskripsi_halaman')</p>

 <!-- Errors -->

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="mb-0">
                {{ $error }}
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif
<!-- End of Errors -->

 <!-- Pesan Berhasil -->
@if (session()->has('pesan'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="mb-0">
                {{ session()->get('pesan') }}
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif
 <!-- End of Pesan Berhasil-->
  <!-- Pesan Warning -->
@if (Route::is('dashboard'))
@if (count($warning) > 0)
@foreach ($warning as $id => $pesan)
     <div  class="alert alert-warning alert-dismissible fade show" role="alert">
            <p class="mb-0"><a href="{{route('obat.edit',$id)}}" class="text-decoration-none text-dark">
                {{ $pesan }}
            </a>
                
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endforeach
@endif
@endif
 <!-- End of Pesan warning-->
        
         <!-- DataTales Example -->
             @yield('konten')
            

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{get_setting('n_Klinik')}}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Pergi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" Jika anda ingin mengakhiri sesi anda.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Custom scripts for all pages-->
  <script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ URL::asset('js/demo/datatables-demo.js') }}"></script>

    
</body>

</html>
