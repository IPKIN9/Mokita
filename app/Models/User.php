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
}
