<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'kursus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'kd_kursus',
        'nm_kursus',
        'jenjang',
        'jdwl_kursus',
        'wkt_kursus',
        'biaya_kursus'
    ];
    public $timestamps = false;
}
