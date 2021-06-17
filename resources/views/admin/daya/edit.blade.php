@extends('layouts.app3')
@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Daya</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('daya.update', ['id' => $tarif->id]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="daya">Daya</label>
                    <input type="text" name="daya" class="form-control @error('daya') is-invalid @enderror" id="daya" placeholder="Masukan Jumlah Daya" value="{{ $tarif->daya }}"
                    @error('daya')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tarifperkwh">Tarif per KWH</label>
                    <input type="text" name="tarifperkwh" class="form-control @error('tarifperkwh') is-invalid @enderror" id="tarifperkwh" placeholder="Masukan Tarif per KWH" value="{{ $tarif->tarifperkwh }}">
                    @error('tarifperkwh')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            </div>
    </div>
</div>
@endsection