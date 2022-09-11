<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_siswa',
        'id_kursus',
        'tgl',
        'jam'
    ];
    public $timestamps = false;
}
