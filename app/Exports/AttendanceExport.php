<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class AttendanceExport implements FromQuery
{


    public function __construct($tgl_mulai, $tgl_akhir)
    {

        $this->tgl_mulai = $tgl_mulai;
        $this->tgl_akhir = $tgl_akhir;
        $this->query = DB::table('absensi')
        ->whereBetween('tgl',[$this->tgl_mulai,$this->tgl_akhir],'and')
        ->leftJoin('siswa','siswa.id_siswa','=','absensi.id_siswa')
        ->leftJoin('kursus','kursus.id','=','absensi.id_kursus')
        ->select('absensi.*','siswa.nis','siswa.nm_siswa','kursus.nm_kursus')
        ->get();
    }

    public function query()
    {

        return $this->query;
    }
}
