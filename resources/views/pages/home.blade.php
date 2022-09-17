@extends('template.layout-admin')

@section('content')

@if(Session::has('success'))
<div class="position-relative" aria-live="polite" aria-atomic="true">
    <div class="toast-container top-0 end-0 p-3">
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000" >
            <div class="toast-body  bg-primary text-white">
                <i class="fas fa-circle-check fa-fw"></i>
                {{ Session::get('success') }}
                <button type="button" class="btn-close btn-sm btn-white float-sm-end" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>

</div>
@endif
@if(session('error'))
<div class="position-relative" aria-live="polite" aria-atomic="true" id="myToast">
    <div class="toast-container top-0 end-0 p-3">
        <div class="d-flex">
            <div  class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000">
                <div class="toast-body bg-danger text-white">
                    <i class="fas fa-circle-exclamation fa-fw"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        </div>

    </div>

</div>
@endif
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Siswa</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h4 class="small text-white">{{ $count_student }} <i class="fas fa-users"></i></h4>
                    <a class="small text-white stretched-link" href="{{ route('siswa') }}">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Instruktur</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h4 class="small text-white">{{ $count_instr }} <i class="fas fa-chalkboard-teacher"></i></h4>
                    <a class="small text-white stretched-link" href="{{ route('instruktur') }}">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Admin</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h4 class="small text-white">{{ $count_admin }} <i class="fas fa-user-shield"></i></h4>
                    <a class="small text-white stretched-link" href="{{ route('admin') }}">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Kelas</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h4 class="small text-white">{{ $count_course }} <i class="fas fa-book-reader"></i></h4>
                    <a class="small text-white stretched-link" href="{{ route('kursus') }}">Lihat</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"  width="100%" height="40">
                    <div id="app" width="100%" height="40">
                        {!! $chart_line->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body">
                    <div id="myBarChart">
                        {!! $chart_bar->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://unpkg.com/vue"></script>
<script>
    var app = new Vue({
        el: '#app',
    });
    var bar = new Vue({
        el: '#myBarChart',
    });
</script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
{!! $chart_line->script() !!}
{!! $chart_bar->script() !!}
@endsection
