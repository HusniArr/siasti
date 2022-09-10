@include('template.partial.header')
@include('template.partial.navbar')
@include('template.partial.sidenav-menu')
@include('template.partial.sidenav-footer')

<div id="layoutSidenav_content">
    <main>
       @yield('content')
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Techno Informatika 2022</div>
                <div>
                    <a href="http://technoinformatika.net/" target="_blank">Privacy Policy</a>
                    &middot;
                    <a href="http://technoinformatika.net/" target="_blank">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

@include('template.partial.footer')

