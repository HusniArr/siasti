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
    <h1 class="mt-4">Kursus</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kursus') }}">Kursus</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ route('kursus.update',$course->kd_kursus)}}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control" id="kd_kursus" name="kd_kursus" type="text" value="{{ $course->kd_kursus }}" disabled/>
                    <label for="kd_kursus">Kode Kursus</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('nm_kursus') is-invalid @enderror" id="nm_kursus" name="nm_kursus" type="text" value="{{ old('nm_kursus',$course->nm_kursus) }}" autocomplete="off"/>
                    <label for="nm_kursus">Nama Kursus</label>
                    @error('nm_kursus')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control  @error('jenjang') is-invalid @enderror"  id="jenjang" name="jenjang" type="text" value="{{ old('jenjang',$course->jenjang) }}"/>
                    <label for="jenjang">Jenjang</label>
                    @error('jenjang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('jdwl_kursus') is-invalid @enderror" id="jdwl_kursus" name="jdwl_kursus" type="text" value="{{ old('jdwl_kursus',$course->jdwl_kursus) }}"  multiple autocomplete="off"/>
                    <label for="jdwl_kursus">Jadwal Kursus</label>
                    @error('jdwl_kursus')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control  @error('wkt_kursus') is-invalid @enderror" data-date-inline-picker="true" id="wkt_kursus" name="wkt_kursus" type="time" value="{{ old('wkt_kursus',$course->wkt_kursus) }}"/>
                    <label for="wkt_kursus">Waktu Kursus</label>
                    @error('wkt_kursus')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="number" class="form-control @error('biaya_kursus') is-invalid @enderror" id="biaya_kursus" name="biaya_kursus" type="number" value="{{ old('biaya_kursus',$course->biaya_kursus) }}" autocomplete="off"/>
                    <label for="biaya_kursus">Biaya Kursus</label>
                    @error('biaya_kursus')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >UPDATE DATA</button></div>
        </div>
    </form>
</div>
@endsection
