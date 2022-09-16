<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection,WithMapping,WithHeadings
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

    public function collection()
    {
        return $this->query;
    }

    public function map($attendance): array
    {
        return [
            $attendance->nis,
            $attendance->nm_siswa,
            $attendance->nm_kursus,
            $attendance->tgl,
            $attendance->jam
        ];

    }

    public function headings(): array
    {
        return [
            'NIS',
            'Nama Siswa',
            'Nama Kelas',
            'Tanggal Presensi',
            'Jam Presensi'
        ];
    }

}
