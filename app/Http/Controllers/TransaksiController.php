<?php

namespace App\Http\Controllers;

use App\Exports\PembayaranExport;
use Illuminate\Http\Request;
use App\Pembayaran;
use App\User;
use App\Transaksi;
use PDF;
use PHPUnit\Framework\Test;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
        $transaksiCheck = Transaksi::where('pembayaran_id', $request->pembayaran_id)->where('user_id', $request->user_id)->first();
        if($transaksiCheck) {
            return redirect()->back()->with([
                'style' => 'danger',
                'message' => "you have paid this SPP before"
            ]);
        }
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

    public function exportReportTransaksi($id)
    {
        $transaksi = Transaksi::with(['user'])->where('pembayaran_id', $id)->orderBy('id', 'DESC')->get();
        
        $result = $transaksi->map(function ($item, $key) {

            return [
                'Nama Siswa' => $item->user->name,
                'NISN' => $item->user->nisn,
                'Tanggal Bayar' => $item->created_at,
                'Invoice' => $item->invoice,
            ];
        });
        return Excel::download(new PembayaranExport($result), 'siswa.xlsx');
    }

    public function reportTransaksiSiswa($id)
    {
        // $transaksi = Transaksi::with(['pembayaran'])->where('user_id', $id)->orderBy('id', 'DESC')->get();
        $user = User::where('id', $id)->first();
        $pembayaran = Pembayaran::with(['transaksi'])->get();
        // dd($pembayaran);
        $transaksiPembayaran = $pembayaran->map(function($item, $key){
            $user = User::where('id', Auth::user()->id)->first();
            $status = false;
            $transaksiId = 0;
            if(!$item->transaksi) {
                $status = false;
            } else {
                foreach ($item->transaksi as $test) {
                    if($test->user_id == $user->id) {
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
                'transaksi_id' => $transaksiId
            ];
        });
        return view('backend.Transaksi.report-transaksi-siswa', compact('transaksiPembayaran', 'user'));
    }

    public function reportTransaksiSiswaInvoice($id)
    {
        $transaksi = Transaksi::with(['pembayaran', 'user'])->where('id', $id)->orderBy('id', 'DESC')->first();
        $pdf = PDF::loadview('backend.Transaksi.pdf-invoice', compact('transaksi'))->setPaper('A4','potrait');
        // return view('backend.Transaksi.pdf-invoice', compact('transaksi'));
        return $pdf->stream();
    }
}
