<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class DayaController extends Controller
{
    public function index(){
        $tarif = Tarif::all();
        return view('admin.daya.index', compact('tarif'));
    }

    public function store(Request $request){
        //dd($request);
        $this->validate($request, [
            'daya' => 'required',
            'tarifperkwh' => 'required',
        ]);

        Tarif::create([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()
            ->route('daya')
            ->with('message', 'Berhasil Menambah Daya!');
    }

    public function edit($id){
        $tarif = Tarif::find($id);
        return view('admin.daya.edit', compact('tarif'));
    }

    public function update($id, Request $request){
        $tarif = Tarif::find($id);

        $this->validate($request,[
            'daya' => 'required',
            'tarifperkwh' => 'required',
        ]);

        $tarif->update($request->all());

        return redirect()
            ->route('daya')
            ->with('message', 'Daya Berhasil Diupdate');
    }

    public function destroy($id){
        $tarif = Tarif::find($id);
        $tarif->delete();
        return redirect()
            ->route('daya')
            ->with('message', 'Berhasil Menghapus Daya');
    }
}
