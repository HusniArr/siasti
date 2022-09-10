<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nis',
        'kd_kursus',
        'nilai',
        'ket'
    ];
    public $timestamps = false;


}
