<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\User;
use App\Transaksi;
use PDF;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search_title_pembayaran']);
        // $pembayaran = Pembayaran::with([])->orderBy('id', 'DESC')->get();
        $pembayaran = $this->getFilters($filters);
        $pembayaranlast = Pembayaran::with([])->latest('id')->first();
        $user = User::with([])->orderBy('id', 'DESC')->get();
        return view('backend.Transaksi.list-jadwal-pembayaran', compact('pembayaran', 'user', 'pembayaranlast', 'filters'));
    }

    public function getFilters($filter){
        $data = Pembayaran::with([]);

        if(!empty($filter['search_title_pembayaran'])){
            $data = $data->where('title_pembayaran','LIKE','%'.$filter['search_title_pembayaran'].'%');
        }

        $data->orderBy('id','desc');
        return $data->get();
    }

    public function storeTransaksi(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $transaksi = new Transaksi();
        $transaksi->pembayaran_id = $request->pembayaran_id;
        $transaksi->user_id = $request->user_id;
        $transaksi->invoice = "PB-SPP-".date('Y-m-d')."-".$user->nisn;
        $transaksi->save();

        return redirect()->back()->with([
            'style' => 'success',
            'message' => "Data Successfully Added"
        ]);
    }

    public function reportTransaksi($id)
    {
        $transaksi = Transaksi::with(['user'])->where('pembayaran_id', $id)->orderBy('id', 'DESC')->get();
        $pembayaran = Pembayaran::where('id', $id)->first();
        return view('backend.Transaksi.report-transaksi', compact('transaksi', 'pembayaran'));
    }

    public function reportTransaksiSiswa($id)
    {
        $transaksi = Transaksi::with(['pembayaran'])->where('user_id', $id)->orderBy('id', 'DESC')->get();
        $user = User::where('id', $id)->first();
        return view('backend.Transaksi.report-transaksi-siswa', compact('transaksi', 'user'));
    }

    public function reportTransaksiSiswaInvoice($id)
    {
        $transaksi = Transaksi::with(['pembayaran', 'user'])->where('id', $id)->orderBy('id', 'DESC')->first();
        $pdf = PDF::loadview('backend.Transaksi.pdf-invoice', compact('transaksi'))->setPaper('A4','potrait');
        // return view('backend.Transaksi.pdf-invoice', compact('transaksi'));
        return $pdf->stream();
    }
}
