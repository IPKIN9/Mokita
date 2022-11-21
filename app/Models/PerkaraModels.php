<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerkaraModels extends Model
{
    protected $table = 'perkara';
    protected $fillable = [
        'id', 'no_perkara', 'id_hakim', 'pengacara', 'penitra', 'id_gugatan',
        'status', 'id_jadwal', 'created_at', 'updated_at'
    ];

    public function scopePerkaraList($query, $limit, $page)
    {
        $page = ($page - 1) * $limit;
        return $query
            ->join('hakim as hakim', 'perkara.id_hakim', '=', 'hakim.id')
            ->join('gugatan as gugatan', 'perkara.id_gugatan', '=', 'gugatan.id')
            ->join('jadwal_sidang as jadwal', 'perkara.id_jadwal', '=', 'jadwal.id')
            ->select(
                'perkara.*',
                'hakim.nama as hakim',
                'jadwal.tgl_waktu_mulai as tgl_sidang',
                'jadwal.tgl_waktu_berakhir as tgl_selesai_sidang',
                'jadwal.ket as keterangan',
                'akta_nikah as no_akta_nikah',
            )
            ->offset($page)->limit($limit);
    }
}
