 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     {{-- sidebar admin --}}
     @if (Auth::user()->roles == 'ADMIN')
         <li class="nav-item active">
             <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.pemohon.index') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Data Pemohon</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.layanan.index') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Data Layanan</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.kantor.index') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Data Kantor</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.petugas.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Petugas</span></a>
        </li>
         <li class="nav-item">
             <a class="nav-link" href="#">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Data Antrian</span></a>
         </li>
     @elseif (Auth::user()->roles == 'PETUGAS')
         <li class="nav-item active">
             <a class="nav-link" href="{{ route('petugas.dashboard.index') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>
     @else
         <li class="nav-item active">
             <a class="nav-link" href="{{ route('dashboard.index') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Beranda</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('antrian.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Antrian Pelayanan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('antrian.data') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Jadwal Antrian</span></a>
        </li>
     @endif

     <li class="nav-item">
         <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Logout</span></a>
     </li>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>

     <!-- Nav Item - Pages Collapse Menu -->
     {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}


 </ul>
 <!-- End of Sidebar -->
