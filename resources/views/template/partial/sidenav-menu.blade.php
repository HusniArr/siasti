<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-success" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav ">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-white"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link text-white" href="{{ route('presensi') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns text-white"></i></div>
                        Presensi
                    </a>
                    @if (Auth::user()->level == 'siswa')
                        <a class="nav-link text-white" href="{{ route('lihat.nilai_kelulusan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns text-white"></i></div>
                            Lihat Nilai
                        </a>
                    @endif
                    @if (Auth::user()->level == 'admin')
                        <a class="nav-link text-white" href="{{ route('nilai') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns text-white"></i></div>
                            Nilai
                        </a>

                    @endif
                    @if (Auth::user()->level == 'admin')
                    <div class="sb-sidenav-menu-heading text-white"><b>Data Master</b> </div>
                        <a class="nav-link collapsed text-white" href="{{ route('admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-shield text-white"></i></div>
                            Admin
                        </a>
                        <a class="nav-link collapsed text-white" href="{{ route('instruktur') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-person-chalkboard text-white"></i></div>
                            Instruktur
                        </a>
                        <a class="nav-link collapsed text-white" href="{{ route('siswa') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate text-white"></i></div>
                            Siswa
                        </a>
                        <a class="nav-link collapsed text-white" href="{{ route('kursus') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open text-white"></i></div>
                            Kursus
                        </a>


                    <div class="sb-sidenav-menu-heading text-white">Laporan</div>
                        <a class="nav-link text-white" href="{{ route('laporan.absensi') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area text-white"></i></div>
                            Absensi Siswa
                        </a>

                    @endif

                </div>
            </div>
