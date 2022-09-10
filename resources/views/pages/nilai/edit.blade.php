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
    <h1 class="mt-4">Nilai</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('nilai') }}">Nilai</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ route('nilai.update',$id_nilai)}}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">NIS</label>
                <div class="mb-2">
                    <select class="form-control form-select" name="nis" id="nis">
                            <option value="">Pilih NIS atau nama siswa</option>
                        @foreach ($students as $item)
                            <option value="{{ $item->nis }}">{{ $item->nis }} | {{ $item->nm_siswa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="">Nama Kursus</label>
                <div class="mb-2">
                    <select class="form-control form-select" name="kd_kursus" id="kd_kursus">
                            <option value="">Pilih nama kursus atau kelas</option>
                        @foreach ($courses as $item)
                            <option value="{{ $item->kd_kursus }}">{{ $item->nm_kursus }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nilai">Nilai</label>
                <div class="mb-2">
                    <input class="form-control  @error('nilai') is-invalid @enderror" data-date-inline-picker="true" id="nilai" name="nilai" type="number"/>
                    @error('nilai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="ket">Keterangan</label>
                <select class="form-control form-select" name="ket" id="ket">
                    <option value="Lulus">Lulus</option>
                    <option value="Tidak Lulus">Tidak Lulus</option>
                </select>
            </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >UPDATE DATA</button></div>
        </div>
    </form>
</div>

<script>
    $('#nis').select2();
    $('#kd_kursus').select2();
    $('#ket').select2();
</script>
@endsection

