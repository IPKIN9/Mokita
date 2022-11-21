<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalSidangModels extends Model
{
    protected $table = 'jadwal_sidang';
    protected $fillable = [
        'tgl_waktu_mulai', 'tgl_waktu_berakhir', 'ket', 'created_at', 'updated_at'
    ];

    public function scopeJadwalList($query, $limit, $page, $search)
    {
        $page = ($page - 1) * $limit;
        if ($search) {
            return $query
                ->where('ket', 'LIKE', '%' . $search . '%')
                ->orWhere('tgl_waktu_mulai', 'LIKE', '%' . $search . '%')
                ->orWhere('tgl_waktu_berakhir', 'LIKE', '%' . $search . '%')
                ->offset($page)
                ->limit($limit);
        } else {
            return $query->offset($page)->limit($limit);
        }
    }
}
