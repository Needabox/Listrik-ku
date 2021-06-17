@extends('layouts.app3')
@section('content')
    <div class="container">
        <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Tagihan</h6>
                </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tagihan.update', ['id' => $tagihan->id]) }}">
                {{ csrf_field() }}
                <fieldset disabled>
                <div class="form-group">
                    <label for="nomor_tagihan">Nomor Tagihan</label>
                    <input type="text" name="nomor_tagihan" class="form-control @error('nomor_tagihan') is-invalid @enderror" id="nomor_tagihan" value="{{ $tagihan->nomor_tagihan }}"
                    @error('nomor_tagihan')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </fieldset>
                <div class="form-group">
                    <label for="bulan_tahun">Bulan dan Tahun</label>
                    <input type="month" name="bulan_tahun" class="form-control @error('bulan_tahun') is-invalid @enderror" id="bulan_tahun" value="{{ $tagihan->penggunaan->bulan_tahun }}">
                    @error('bulan_tahun')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="meter_awal">Meter Awal</label>
                    <input type="text" name="meter_awal" class="form-control @error('meter_awal') is-invalid @enderror" id="meter_awal" value="{{ $tagihan->penggunaan->meter_awal }}">
                    @error('meter_awal')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="meter_akhir">Meter Akhir</label>
                    <input type="text" name="meter_akhir" class="form-control @error('meter_akhir') is-invalid @enderror" id="meter_akhir" value="{{ $tagihan->penggunaan->meter_akhir }}">
                    @error('meter_akhir')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" @if ($tagihan->status == 0) selected @endif>Menunggu Pembayaran</option>
                        <option value="1" @if ($tagihan->status == 1) selected @endif>Menunggu Konfirmasi</option>
                        <option value="2" @if ($tagihan->status == 2) selected @endif>Pembayaran Sukses</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modelId">
                    Hapus
                </button>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Tagihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Tagihan?
            </div>
            <div class="modal-footer">
                <a href="{{ route('tagihan.delete', ['id' => $tagihan->id]) }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>