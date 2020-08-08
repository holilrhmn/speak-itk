<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravelista\Comments\Commenter;
use App\Laporan;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use Commenter;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password','google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function laporan(){
        return $this->hasMany('App\Laporan');
    }

    public function unit(){
        return $this->hasMany('App\Laporan');
    }

    public function socialAccounts()
    {
    return $this->hasMany(SocialAccount::class);
    }
}

