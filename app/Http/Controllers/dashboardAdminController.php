<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class dashboardAdminController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'Siswa')->get();
        $transaksi = Transaksi::get();
        $pembayaran = Pembayaran::get();
        return view('backend/dashboardAdmin', compact('siswa', 'transaksi', 'pembayaran'));
    }
}
