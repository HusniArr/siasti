@extends('template.layout-admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Instruktur</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('instruktur') }}">Instruktur</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
    <form action="/instruktur/tambah">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('kd_instr') is-invalid @enderror" id="kd_instr" name="kd_instr" type="text" placeholder="Masukan NIP" autocomplete="off" autofocus/>
                    <label for="kd_instr">NIP</label>
                    @error('kd_instr')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="name@example.com" autocomplete="off"/>
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
