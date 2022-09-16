@extends('template.layout-admin')

@section('content')
<div class="container-fluid px-4">
    @if(Session::has('message'))
    <div class="position-relative" aria-live="polite" aria-atomic="true">
        <div class="toast-container top-0 end-0">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000" >
                <div class="toast-body  bg-primary text-white">
                    <i class="fas fa-circle-check fa-fw"></i>
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close btn-sm btn-white float-sm-end" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        </div>

    </div>
    @endif
    @if(Session::has('error'))
    <div class="position-relative" aria-live="polite" aria-atomic="true">
        <div class="toast-container top-0 end-0">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000" >
                <div class="toast-body  bg-danger text-white">
                    <i class="fas fa-exclamation-circle fa-fw"></i>
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close btn-sm btn-white float-sm-end" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        </div>

    </div>
    @endif
    <h1 class="mt-4">Laporan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
    <form action="{{ route('laporan.show') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai" id="tgl_mulai" data-date-inline-picker="true">
                @error('tgl_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" id="tgl_akhir" data-date-inline-picker="true">
                @error('tgl_akhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <button class="btn btn-md btn-outline-primary" type="submit" name="btnSearch" id="btnSearch"><i class="fas fa-search fa-fw"></i> Cari</button>
                <a href="{{ url('laporan/export_excel?tgl_mulai='.Request::get('tgl_mulai').'&tgl_akhir='.Request::get('tgl_akhir').'')}}" class="btn btn-md btn-outline-success export-excel" ><i class="far fa-file-excel fa-fw"></i>Export Excel</a>
                <a href="{{ url('laporan/export_pdf?tgl_mulai='.Request::get('tgl_mulai').'&tgl_akhir='.Request::get('tgl_akhir').'')}}" class="btn btn-md btn-outline-danger export-pdf" ><i class="far fa-file-excel fa-fw"></i>Export Pdf</a>
            </div>
        </div>
    </form>
    <div class="mb3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Nama Kelas</th>
                    <th>Tanggal Presensi</th>
                    <th>Jam Presensi</th>
                </tr>
            </thead>
            <tbody>
                @if ($query)
                    @foreach ($query as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nm_siswa }}</td>
                        <td>{{ $item->nm_kursus }}</td>
                        <td>{{ $item->tgl }}</td>
                        <td>{{ $item->jam }}</td>
                    </tr>

                    @endforeach
                @else
                    <tr>
                        <td colspan="6" align="center">Data laporan tidak ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
