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

    public function scopeClientList($query, $limit, $page, $search)
    {
        $page = ($page - 1) * $limit;
        if ($search['nama'] & $search['status']) {
            $result = $query->where('nama', 'LIKE', '%' . $search['nama'] . '%')->where('status', 'LIKE', '%' . $search['status'] . '%');
        } else if ($search['nama']) {
            $result = $query->where('nama', 'LIKE', '%' . $search['nama'] . '%');
        } else if ($search['status']) {
            $result = $query->where('status', 'LIKE', '%' . $search['status'] . '%');
        } else {
            $result = $query;
        }

        return $result->offset($page)->limit($limit);
    }
}
