<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GugatanModels extends Model
{
    protected $table = 'gugatan';
    protected $fillable = [
        'id_penggugat', 'id_tergugat', 'tgl_pernikahan', 'kec', 'kab',
        'akta_nikah', 'tinggal1', 'tinggal2', 'tgl_tidak_rukun', 'penyebab',
        'puncak_konflik', 'lama_pisah',
        'created_at', 'updated_at'
    ];

    public function scopeGugatanList($query, $limit, $page, $search)
    {
        $page = ($page - 1) * $limit;
        if ($search) {
            return $query
                ->join('client as penggugat', 'gugatan.id_penggugat', '=', 'penggugat.id')
                ->join('client as tergugat', 'gugatan.id_tergugat', '=', 'tergugat.id')
                ->select('gugatan.*', 'penggugat.nama as penggugat', 'tergugat.nama as tergugat')
                ->where('penggugat.nama', 'LIKE', '%' . $search . '%')
                ->orWhere('tergugat.nama', 'LIKE', '%' . $search . '%')
                ->orWhere('akta_nikah', 'LIKE', '%' . $search . '%')
                ->offset($page)
                ->limit($limit);
        } else {
            return $query
                ->join('client as penggugat', 'gugatan.id_penggugat', '=', 'penggugat.id')
                ->join('client as tergugat', 'gugatan.id_tergugat', '=', 'tergugat.id')
                ->select('gugatan.*', 'penggugat.nama as penggugat', 'tergugat.nama as tergugat')
                ->offset($page)
                ->limit($limit);
        }
    }
}
