<?php

namespace App;
use App\Category;
use App\User;
use Laravelista\Comments\Commentable;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use Commentable;
    protected $guarded = [];
    protected $table = 'laporan';
    public function kategori()
    {
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function unit(){
        return $this->belongsTo('App\User');
    }
    
    public function status(){
        return $this->belongsTo('App\Status');
    }

    public static function getJumlahLaporanPerTahun(){


    	$tahun_awal = date('Y') - 5;
    	$tahun_akhir = date('Y');

    	$category = [];

    	$series[0]['name'] = 'Terselesaikan';
    	$series[1]['name'] = 'Belum Terselesaikan';



    	$j = 0;
    	for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) {
    		$category[] = $i;

    		$series[0]['data'][] = Self::where('status_id', '=', '4')->where('created_at','like', $i.'%')->count();
    		$series[1]['data'][] = Self::where('status_id', '<', '4')->where('created_at','like', $i.'%')->count();

    	}


        return ['category' => $category, 'series' => $series];
    }
}
