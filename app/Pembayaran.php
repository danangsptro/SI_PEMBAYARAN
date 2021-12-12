<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaksi;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $guarded = [];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pembayaran_id', 'id');
    }
}
