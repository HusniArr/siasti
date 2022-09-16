<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('') }}">SIASTI</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form action="{{ route('cari.data') }}" method="POST" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            @csrf
            <div class="input-group">
                <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Cari data siswa atau pengajar disini" aria-label="Cari nama ..." aria-describedby="btnNavbarSearch" style="width:400px" autocomplete="off"/>
                <button type="submit" class="btn btn-primary" id="btnNavbarSearch"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>{{ Auth::user()->username }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @if (Auth::user()->level == 'siswa')
                    <li><a class="dropdown-item" href="{{ route('pengaturan.profil') }}"><i class="fas fa-gear fa-fw"></i>Profil</a></li>
                    @endif
                    <li><a class="dropdown-item" href="{{ route('pengaturan.sandi') }}"><i class="fas fa-gear fa-fw"></i>Password</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="{{ url('/logout')}}"><i class="fas fa-right-from-bracket fa-fw"></i>Keluar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
