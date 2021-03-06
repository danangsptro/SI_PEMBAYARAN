<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with([])->orderBy('id', 'DESC')->get();
        return view('backend.Pembayaran.index', compact('pembayaran'));
    }

    public function storePembayaran(Request $request, $id=null)
    {
        try {

            if($id){
                $pembayaran = Pembayaran::where('id', $id)->with([])->first();
                if(!$pembayaran){
                    return redirect()->back()->with([
                        'message'   => 'Tidak ada siswa dengan id tersebut',
                        'style'     => 'danger'
                    ]);
                }
                $pembayaran->title_pembayaran = $request->title_pembayaran;
                $pembayaran->tgl_mulai = $request->tgl_mulai;
                $pembayaran->jatuh_tempo = $request->jatuh_tempo;
                $pembayaran->save();

                return redirect()->back()->with([
                    'message'   => 'Pembayaran SPP success',
                    'style'     => 'success'
                ]);

            }
            $pembayaran = new pembayaran();
            $pembayaran->title_pembayaran = $request->title_pembayaran;
            $pembayaran->tgl_mulai = $request->tgl_mulai;
            $pembayaran->jatuh_tempo = $request->jatuh_tempo;
            $pembayaran->save();

            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Data Successfully Added"
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return redirect()->back()->with([
                'style' => 'danger',
                'message' => $message
            ]);
        }
    }

    public function deletePembayaran($id)
    {
        try {
            $pembayaran = Pembayaran::where('id', $id)->with([])->first();
            $pembayaran->delete();
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Delete jadwal pembayaran Successfully"
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Delete jadwal pembayaran error :".$e->getMessage()
            ]);
        }
    }
}
