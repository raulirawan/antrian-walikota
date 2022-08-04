<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'data_antrian';

    public function layanan()
    {
        return $this->belongsTo(Layanan::class,'layanan_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function kantor()
    {
        return $this->belongsTo(Kantor::class,'kantor_id','id');
    }

    protected $casts = [
        'tanggal_kedatangan' => 'datetime',
     ];
}
