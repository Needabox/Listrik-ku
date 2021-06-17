<?php

namespace App\Http\Controllers;

use mt;
use App\Models\User;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use App\Models\Penggunaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    public function index(){
        $tagihan = Tagihan::all();
        $pelanggan = User::all();
        return view('admin.tagihan.index', compact('tagihan', 'pelanggan'));
    }

    public function store(Request $request){
        //dd($request);

        $bulan_tahun = $request->bulan_tahun;
        $penggunaan = Penggunaan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'bulan_tahun' => $request->bulan_tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        $jumlah_meter = $request->meter_akhir - $request->meter_awal;

        Tagihan::create([
            'id_penggunaan' => $penggunaan->id,
            'id_pelanggan' => $request->id_pelanggan,
            'nomor_tagihan' => mt_rand(1000000, 9999999),
            'bulan_tahun' => $penggunaan->bulan_tahun,
            'jumlah_meter' => $jumlah_meter,
        ]);

        return redirect()
            ->route('tagihan')
            ->with('message', 'Berhasil Menambah Tagihan');
    }

    public function edit($id){
        $tagihan = Tagihan::find($id);
        $penggunaan = Penggunaan::all();
        return view('admin.tagihan.edit', compact('tagihan', 'penggunaan'));
    }

    public function update(Request $request, $id){
        //dd($request);

        DB::table('penggunaan')->where('id',$request->id)->update([
            'bulan_tahun' => $request->bulan_tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        $jumlah_meter = $request->meter_akhir - $request->meter_awal;

        DB::table('tagihan')->where('id',$request->id)->update([
            'bulan_tahun' => $request->bulan_tahun,
            'jumlah_meter' => $jumlah_meter,
            'status' => $request->status,
        ]);

        // Pembayaran::create([
        //     'id_admin' => Auth::guard('admin')->user()->id,
        // ]);

        $pembayaran = Pembayaran::find($id);
        $tagihan =  Tagihan::find($id);
        DB::table('pembayaran')->where('id_tagihan', $tagihan->id)->update([
            'id_admin' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()
            ->route('tagihan')
            ->with('message', 'Berhasil Merubah Tagihan'); 
    }

    public function destroy($id){

        $tagihan = Tagihan::find($id);
        $tagihan->delete();
            return redirect()
                ->route('tagihan')
                ->with('message', 'Berhasil Menghapus Tagihan');
    }
}
