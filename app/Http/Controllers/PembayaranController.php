<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index(){
        $tagihan = Tagihan::where('id_pelanggan', Auth::user()->id)->where('status', 0)->get();
        return view('pelanggan.pembayaran.index', compact('tagihan'));
    }

    public function bayar($id){
        $tagihan = Tagihan::find($id);
        return view('pelanggan.pembayaran.bayar', compact('tagihan'));
    }

    public function update(Request $request,$id){
        //dd($request);
        $tagihan = Tagihan::find($id);

        $total = ($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh + 5000);

        if ($request->uang < $total ) {
            return redirect()
                ->back()
                ->with('message', 'Uang Anda Kurang');
        }

        $pembayaran = Pembayaran::create([
            'id_tagihan' => $tagihan->id,
            'id_pelanggan' => Auth::user()->id,
            'tanggal_pembayaran' => Carbon::now()->format('D'),
            'bulan_bayar' => Carbon::now()->isoFormat('YYYY-MM'),
            'biaya_admin' => 5000,
            'uang' => $request->uang,
            'total_bayar' => $total,
        ]);

        DB::table('tagihan')->where('id',$tagihan->id)->update([
            'status' => 1,
        ]);

        return redirect()
            ->route('success', ['id' => $pembayaran->id]);
    }

    public function success($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('success', compact('pembayaran'));
    }

    public function cetak($id)
    {
        $pembayaran = Pembayaran::find($id);
        $tagihan = Tagihan::all();
        $tanggal = Carbon::now()->format('l, d F Y');
        
        $pdf = PDF::loadview('cetak',compact('pembayaran', 'tagihan', 'tanggal'))->setPaper('A5','potrait');
        return $pdf->stream();
    }
}
