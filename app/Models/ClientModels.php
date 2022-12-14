<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientModels extends Model
{
    protected $table = 'client';
    protected $fillable = [
        'id', 'status', 'nama', 'marga', 'tempat_lahir', 'tgl_lahir',
        'agama', 'pendidikan', 'pekerjaan', 'alamat', 'kel', 'kec', 'kab',
        'created_at', 'updated_at'
    ];
}
