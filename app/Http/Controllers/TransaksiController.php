<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\User;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with([])->orderBy('id', 'DESC')->get();
        $user = User::with([])->orderBy('id', 'DESC')->get();
        return view('backend.Transaksi.list-jadwal-pembayaran', compact('pembayaran', 'user'));
    }
}
