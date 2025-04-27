<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserModel extends Authenticatable implements JWTSubject
{
    use HasFactory;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    // protected $fillable = [
    //     'level_id',
    //     'username',
    //     'nama',
    //     'password',
    //     'path_foto'
    // ];

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password',
        'image',
        'created_at',
        'updated_at'
    ];


    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/posts/' . $image),
        );
    }
    //mendapatkan nama role
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    //cek apakah user memiliki role tertentu
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

    //mendapatkan kode role
    public function getRole()
    {
        return $this->level->level_kode;
    }
}