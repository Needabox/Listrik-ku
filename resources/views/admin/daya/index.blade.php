@extends('layouts.app3')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daya</h1>
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                    Add Daya
                </button>
        </div>

        <div class="row">
        <div class="col-lg-12 mb-4">
            @if (session()->has('message'))
                <div class="container alert alert-success">
                    <strong style="color: rgb(255, 255, 255)">{{ session()->get('message') }}</strong>
                    <button class="close" type="button" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Daya</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                        <th>No</th>
                        <th>Daya</th>
                        <th>Tarif Per/Kwh</th>
                        <th>Didaftarkan pada:</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($tarif as $t)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $t->daya }} Watt</th>
                                <th>Rp. {{ number_format($t->tarifperkwh) }}</th>
                                <th>{{ $t->created_at->format('l, d/m/y') }}</th>
                                <th>
                                    <a href="{{ route('daya.edit', ['id' => $t->id]) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('daya.delete', ['id' => $t->id]) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus daya?')">Delete</a>
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
                <h5 class="modal-title">Add daya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('daya.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="daya">Daya</label>
                        <input type="number" name="daya" id="daya" class="form-control @error('daya') is-invalid @enderror" placeholder="Masukan Jumlah Daya" aria-describedby="helpId">
                        @error('daya')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tarifperkwh">Tarif per KWH</label>
                        <input type="number" name="tarifperkwh" id="tarifperkwh" class="form-control @error('tarifperkwh') is-invalid @enderror" placeholder="Masukan Tarif Per KWH" aria-describedby="helpId">
                        @error('tarifperkwh')
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
