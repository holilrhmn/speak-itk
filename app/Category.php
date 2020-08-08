<?php

namespace App;
use App\Laporan;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function laporan()
    {
        return $this->hasMany('App\Laporan');
    }
}
