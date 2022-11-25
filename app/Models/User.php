<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable, HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'nama', 'email', 'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query
                ->where('role', 'see-list')
                ->where('nama', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')->select('nama');
        } else {
            return $query->where('role', 'see-list')->select('nama');
        }
    }

    public function scopeDashboard($query, $id)
    {
        $user = $query->whereId($id)->select('nama')->first();
        $con = new PerkaraModels();

        $perkara = $con->where('pengacara', 'LIKE', '%' . $user->nama . '%')
            ->PerkaraList(100, 1)
            ->select('no_perkara', 'hakim.nama as hakim', 'pengacara', 'status', 'jadwal.tgl_waktu_mulai as tgl_sidang')
            ->get();

        return $perkara;
    }
}
