@extends('layouts.app2')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                @if (session()->has('message'))
                <div class="container alert alert-danger">
                    <strong style="color: rgb(206, 63, 63)">{{ session()->get('message') }}</strong>
                    <button class="close" type="button" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Bayar : <strong>Rp. {{ number_format($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh + 5000) }}</strong></h3>
                                <small>Jumlah : <strong>Rp. {{ number_format($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) }}</strong> + Biaya Admin : <Strong>Rp. 5.000</Strong></small>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up lnr-chevron-down"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">Rincian
                                <p>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Nama Pelanggan
                                            <span class="badge badge-primary badge-pill">{{ $tagihan->pelanggan->nama_pelanggan }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Bulan Dan Tahun
                                            <span class="badge badge-primary badge-pill">{{ $tagihan->bulan_tahun->format('M Y') }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Kode Tagihan
                                            <span class="badge badge-primary badge-pill">#{{ $tagihan->nomor_tagihan }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Meter Awal
                                            <span class="badge badge-primary badge-pill">{{ $tagihan->penggunaan->meter_awal }} KWH</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Meter Akhir
                                            <span class="badge badge-primary badge-pill">{{ $tagihan->penggunaan->meter_akhir }} KWH</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Jumlah Meter
                                            <span class="badge badge-primary badge-pill">{{ $tagihan->jumlah_meter }} KWH</span>
                                        </li>
                                    </ul>
                                </p>
                            </div>
                            <div class="panel-footer">
                                <form method="POST" action="{{ route('pembayaran.store', ['id' => $tagihan->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <input type="number" name="uang" class="form-control @error('uang') is-invalid @enderror">
                                        </div>
                                        <div class="col-sm-7">
                                            <button class="btn btn-success">Bayar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection