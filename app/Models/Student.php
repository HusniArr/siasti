<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;
    protected $fillable = [
        'id_siswa',
        'nis',
        'nm_siswa',
        'tgl_lhr',
        'tpt_lhr',
        'jns_kel',
        'alamat',
        'no_telp',
        'gbr_siswa',
        'id_user'
    ];
}
