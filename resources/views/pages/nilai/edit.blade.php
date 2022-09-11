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
    <form action="{{ route('nilai.update',$score->id)}}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">NIS</label>
                <div class="mb-2">
                    <input type="hidden" name="id_nilai" id="id_nilai" value="{{ $score->id }}">
                    <select class="form-control form-select" name="id_siswa" id="id_siswa" disabled>
                            <option value="">Pilih NIS atau nama siswa</option>
                        @foreach ($students as $item)
                            <option value="{{ $item->id_siswa }}" {{ ($item->id_siswa == $score->id_siswa) ? "selected" : "" }}>{{ $item->nis }} | {{ $item->nm_siswa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="">Nama Kursus</label>
                <div class="mb-2">
                    <select class="form-control form-select @error('id_kursus') is-invalid @enderror" name="id_kursus" id="id_kursus">
                            <option value="">Pilih nama kursus atau kelas</option>
                        @foreach ($courses as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $score->id_kursus) ? "selected" : "" }}>{{ $item->nm_kursus }}</option>
                        @endforeach
                    </select>
                    @error('id_kursus')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nilai">Nilai</label>
                <div class="mb-2">
                    <input class="form-control  @error('nilai') is-invalid @enderror" data-date-inline-picker="true" id="nilai" name="nilai" type="number" value="{{ old('nilai',$score->nilai) }}"/>
                    @error('nilai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="ket">Status</label>
                <select class="form-control form-select @error('ket') is-invalid @enderror" name="ket" id="ket">
                    <option value="">Pilih status</option>
                    <option value="Lulus" {{ ($score->ket == "Lulus") ? "selected" : "" }}>Lulus</option>
                    <option value="Tidak Lulus" {{ ($score->ket == "Tidak Lulus") ? "selected" : ""}}>Tidak Lulus</option>
                    @error('ket')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>
            </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >UPDATE DATA</button></div>
        </div>
    </form>
</div>

<script>
    $('#id_siswa').select2();
    $('#id_kursus').select2();
    $('#ket').select2();
</script>
@endsection

