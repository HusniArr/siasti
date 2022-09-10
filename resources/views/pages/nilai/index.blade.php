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
        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Nilai</li>
    </ol>
    <div class="mb-4"><a href="{{ route('nilai.tambah') }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i>Tambah</a></div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Daftar Nilai
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Nama Kursus</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($allData as $row)

                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $row->nis }}</td>
                            <td>{{ $row->nm_siswa }}</td>
                            <td>{{ $row->nm_kursus }}</td>
                            <td>{{ $row->nilai }}</td>
                            <td>{{ $row->ket }}</td>
                            <td>
                                <a href="{{ url('nilai/'.$row->id.'/edit')}}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i>Edit</a>
                                <a href="{{ route('nilai.delete',$row->id)}}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash">Hapus</i></a>
                            </td>
                        </tr>

                   @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
