<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $guarded = [];

    protected $table = 'guru';
    protected $fillable = [
        'nomer_induk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'gender',
        'mapel',
        'jabatan',
        'tahun_menjabat',
        'foto',
    ];
}
