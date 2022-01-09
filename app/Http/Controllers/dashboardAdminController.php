<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\json_encode;

class dashboardAdminController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'Siswa')->get();
        $transaksi = Transaksi::get();
        $pembayaran = Pembayaran::with(['transaksi'])->get();
        $sspBelumBayar = 0;
        $list = [];

        $transaksiPembayaran = $pembayaran->map(function($item, $key){
            $userId = Auth::user()->id;
            $status = false;
            $transaksiId = 0;
            if(!$item->transaksi) {
                $status = false;
            } else {
                foreach ($item->transaksi as $test) {
                    if($test->user_id == $userId) {
                        $status = true;
                        if($status) {
                            $transaksiId = $test->id;
                        }
                    }
                }
            }
            return [
                'title' => $item->title_pembayaran,
                'statuses' => ($status) ? 'sudah bayar' : 'belum bayar',
                'transaksi_id' => $transaksiId,
                'tgl_mulai' => $item->tgl_mulai,
                'jatuh_tempo' => $item->jatuh_tempo,
            ];
        });
        $listPembayaran = $transaksiPembayaran;
        foreach ($transaksiPembayaran as $item) {
            if($item['statuses'] == 'belum bayar') {
                $sspBelumBayar += 1;
            }
        }
        return view('backend/dashboardAdmin', compact('siswa', 'transaksi', 'pembayaran', 'sspBelumBayar', 'listPembayaran'));
    }
}
