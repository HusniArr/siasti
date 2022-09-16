@extends('template.layout-admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
    <div class="row">
        @if($data_student)
            @foreach ($data_student as $item)
            <div class="col-md-4 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'.$item->gbr_siswa) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h6 class="card-title">Nama / NIS : {{$item->nm_siswa}} / {{$item->nis}} (Siswa)</h6>
                      <p class="card-text">
                       Tempat, tanggal lahir : {{$item->tpt_lhr}} , {{ $item->tgl_lhr}}
                        </p>
                    <p class="card-text">Alamat : {{ $item->alamat }}</p>
                    </div>
                  </div>
                </div>
                @endforeach
        @endif
            @if($data_instr)
            @foreach ($data_instr as $item)
            <div class="col-md-4 p-2">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'.$item->gbr_instr) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h6 class="card-title">Nama / NIP : {{$item->nm_instr}} - {{ $item->kd_instr }} (Pengajar)</h6>
                      <p class="card-text">
                       Tempat, tanggal lahir : {{$item->tpt_lhr}} , {{ $item->tgl_lhr}}
                        </p>
                        <p class="card-text">Alamat : {{ $item->alamat }}</p>
                    </div>
                  </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
