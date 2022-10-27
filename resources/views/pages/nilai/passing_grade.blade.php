@extends('template.layout-admin')


@section('content')
<div class="container-fluid px-4">
<h1 class="mt-4">Nilai</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Nilai</li>
</ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Daftar Nilai Kelulusan
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Nama Kursus / Kelas</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
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
                            <td><span class="bg-success text-white">{{ $row->ket }}</span></td>
                        </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

