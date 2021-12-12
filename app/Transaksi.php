<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pembayaran;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id', 'id');
    }
}
