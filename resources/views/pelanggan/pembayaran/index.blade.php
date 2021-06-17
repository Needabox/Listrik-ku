@extends('layouts.app2')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Daftar Tagihan</h3>
                            </div>
                            @if (session()->has('message'))
                            <div class="container alert alert-success">
                                <strong style="color: rgb(255, 255, 255)">{{ session()->get('message') }}</strong>
                                <button class="close" type="button" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="panel-body">
                                <table class="table table-hover table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nomor Tagihan</th>
                                            <th>Bulan Dan Tahun</th>
                                            <th>Total</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tagihan as $t)
                                            <tr>
                                                <th>{{ $t->pelanggan->nama_pelanggan }}</th>
                                                <th>#{{ $t->nomor_tagihan }}</th>
                                                <th>{{ $t->bulan_tahun->format('M Y') }}</th>
                                                <th>Rp. {{ number_format($t->jumlah_meter * $t->pelanggan->tarif->tarifperkwh + 5000) }}</th>
                                                <th>
                                                    <a href="{{ route('bayar', ['id' => $t->id]) }}" class="btn btn-success">Bayar</a>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection