<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = ['id_tiket', 'qty', 'status'];

    public function tiket()
    {
        return $this->belongsTo(tiket::class, 'id_tiket');
    }
}
