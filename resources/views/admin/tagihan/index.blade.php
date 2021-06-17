@extends('layouts.app3')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tagihan</h1>
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                    Add Tagihan
                </button>
        </div>

        <div class="row">
        <div class="col-lg-12 mb-4">

            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Tagihan</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                        <th>No</th>
                        <th>Nomor Tagihan</th>
                        <th>Nama Pelanggan</th>
                        <th>Bulan dan Tahun</th>
                        <th>Jumlah Meter</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($tagihan as $t)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>#{{ $t->nomor_tagihan }}</th>
                                <th>{{ $t->pelanggan->nama_pelanggan }}</th>
                                <th>{{ $t->bulan_tahun->format('M Y') }}</th>
                                <th>{{ $t->jumlah_meter }}</th>
                                <th>
                                    @if ($t->status == 1)
                                    <span class="badge badge-info">Menunggu Konfirmasi</span>
                                    @elseif($t->status == 2)
                                    <span class="badge badge-success">Pembayaran Berhasil</span>
                                    @else
                                    <span class="badge badge-warning">Menunggu Pembayaran</span>
                                    @endif
                                </th>
                                <th>
                                    <a href="{{ route('tagihan.edit', ['id' => $t->id]) }}" class="btn btn-sm btn-primary">Edit</a>
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
@endsection
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Tagihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tagihan.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="id_pelanggan">Pelanggan</label>
                        <select name="id_pelanggan" id="id_pelanggan" class="form-control">
                            <option class="disabled">== Pilih Pelanggan ==</option>
                            @foreach ($pelanggan as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                        @error('daya')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bulan_tahun">Bulan</label>
                        <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control @error('bulan_tahun') is-invalid @enderror" placeholder="Masukan Tarif Per KWH" aria-describedby="helpId">
                        @error('bulan_tahun')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meter_awal">Meter Awal</label>
                        <input type="number" name="meter_awal" id="meter_awal" class="form-control @error('meter_awal') is-invalid @enderror" placeholder="Masukan Meter Awal">
                        @error('meter_awal')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meter_akhir">Meter Akhir</label>
                        <input type="number" name="meter_akhir" id="meter_akhir" class="form-control @error('meter_akhir') is-invalid @enderror" placeholder="Masukan Meter Awal">
                        @error('meter_akhir')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
