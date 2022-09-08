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
    <h1 class="mt-4">Instruktur</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('instruktur') }}">Instruktur</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
    <form action="{{ route('instruktur.simpan')}}" method="POST" enctype="multipart/form-data">
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
                    <input class="form-control @error('nm_instr') is-invalid @enderror" id="nm_instr" name="nm_instr" type="text" placeholder="Masukan Nama" autocomplete="off"/>
                    <label for="nm_instr">Nama Lengkap</label>
                    @error('nm_instr')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control  @error('tgl_lhr') is-invalid @enderror" data-date-inline-picker="true" id="tgl_lhr" name="tgl_lhr" type="date" placeholder="Tanggal lahir"/>
                    <label for="tgl_lhr">Tanggal Lahir</label>
                    @error('tgl_lhr')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('tpt_lhr') is-invalid @enderror" id="tpt_lhr" name="tpt_lhr" type="text" placeholder="Masukan tempat lahir" autocomplete="off"/>
                    <label for="tpt_lhr">Tempat Lahir</label>
                    @error('tpt_lhr')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Jenis Kelamin</label><hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jns_kel" id="jns_kel" value="L">
                    <label class="form-check-label" for="jns_kel">
                      Laki - laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jns_kel" id="jns_kel" value="P">
                    <label class="form-check-label" for="jns_kel">
                      Perempuan
                    </label>
                  </div>
                @error('jns_kel')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" placeholder="Masukan alamat rumah"></textarea>
                    <label for="alamat">Alamat</label>
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" type="text" placeholder="Masukan No.Telp" autocomplete="off" autofocus/>
                    <label for="no_telp">No.Telp / HP</label>
                </div>
                @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <div class="file-drop-area">
                        <span class="choose-file-button">Upload Gambar</span>
                        <span class="file-message">Drag dan drop file disini</span>
                        <input class="file-input" type="file" id="gbr_instr" name="gbr_instr" accept="image/*">
                      </div>
                </div>
                @error('gbr_instr')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >SIMPAN DATA</button></div>
        </div>
    </form>
</div>
@endsection
