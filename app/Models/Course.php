<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kursus';
    protected $primaryKey = 'kd_kursus';
    protected $fillable = [
        'kd_kursus',
        'nm_kursus',
        'jenjang',
        'jdwl_kursus',
        'wkt_kursus',
        'biaya_kursus'
    ];
}
