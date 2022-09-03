<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instruktur';
    protected $primaryKey = 'kd_instr';
    protected $fillable = [
        'kd_instr',
        'nm_instr',
        'tgl_lhr',
        'tpt_lhr',
        'jns_kel',
        'alamat',
        'no_telp',
        'gbr_instr'
    ];
    public $timestamps = false;
}
