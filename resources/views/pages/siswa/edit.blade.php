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
    <h1 class="mt-4">Siswa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('siswa') }}">Siswa</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form action="{{ url('siswa/'.$student->id_siswa.'/edit')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" type="text" value="{{ $student->nis }}" placeholder="Masukan NIS" autocomplete="off" autofocus/>
                    <label for="nis">NIS</label>
                    @error('nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('nm_siswa') is-invalid @enderror" id="nm_siswa" name="nm_siswa" type="text" value="{{ $student->nm_siswa }}" placeholder="Masukan Nama" autocomplete="off"/>
                    <label for="nm_siswa">Nama Lengkap</label>
                    @error('nm_siswa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control  @error('tgl_lhr') is-invalid @enderror" data-date-inline-picker="true" value="{{ $student->tgl_lhr }}" id="tgl_lhr" name="tgl_lhr" type="date" placeholder="Tanggal lahir"/>
                    <label for="tgl_lhr">Tanggal Lahir</label>
                    @error('tgl_lhr')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('tpt_lhr') is-invalid @enderror" id="tpt_lhr" name="tpt_lhr" type="text" value="{{ $student->tpt_lhr }}" placeholder="Masukan tempat lahir" autocomplete="off"/>
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
                    <input class="form-check-input" type="radio" name="jns_kel" id="jns_kel" value="L" {{ ($student->jns_kel == 'L') ? 'checked' : ''}}>
                    <label class="form-check-label" for="jns_kel">
                      Laki - laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jns_kel" id="jns_kel" value="P" {{ ($student->jns_kel == 'P') ? 'checked' : ''}}>
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
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text">{{ $student->alamat }}</textarea>
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
                    <input class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" type="text" placeholder="Masukan No.Telp" value="{{ $student->no_telp }}" autocomplete="off" autofocus/>
                    <label for="no_telp">No.Telp / HP</label>
                </div>
                @error('no_telp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <div class="file-drop-area">
                        <span class="choose-file-button">Upload Gambar</span>
                        <span class="file-message">Drag dan drop file disini</span>
                        <input class="file-input" type="file" id="gbr_siswa" name="gbr_siswa">
                      </div>
                </div>
                @error('gbr_instr')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control" id="username" name="username" type="text" placeholder="Masukan Username" value="{{ $user->username }}" autocomplete="off" disabled/>
                    <label for="username">Usename</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Masukan Email" value="{{ $user->email }}" autocomplete="off" autofocus/>
                    <label for="email">Email</label>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="text" placeholder="Masukan Password" autocomplete="off" autofocus/>
                    <label for="password">Password</label>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" type="password_confirmation" autocomplete="off" autofocus/>
                    <label for="password_confirmation">Ulangi Password</label>
                </div>
            </div>
        </div>
        <div class="mt-4 mb-0">
            <input type="hidden" name="id_user" id="id_user" value="{{ $user->id }}">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >UPDATE DATA</button></div>
        </div>
    </form>
</div>
@endsection
