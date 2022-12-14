<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GugatanModels extends Model
{
    protected $table = 'gugatan';
    protected $fillable = [
    'id_penggugat', 'id_tergugat', 'tgl_pernikahan', 'kec', 'kab',
    'akta_nikah', 'tinggal1', 'tinggal2', 'tgl_tidak_rukun', 'penyebab',
    'puncak_konflik', 'tinggal_setelah_pisah',
    'created_at', 'updated_at'
    ];
}
