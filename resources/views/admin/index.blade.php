@extends('layouts.app3')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                    Add Type
                </button>
        </div>

        <div class="row">
        <div class="col-lg-12 mb-4">
            @if (session()->has('message'))
                <div class="container alert alert-success">
                    <strong style="color: black">{{ session()->get('message') }}</strong>
                    <button class="close" type="button" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Type</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>keterangan</th>
                        <th>Didaftarkan pada:</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>MUHAMMAD RAFLI</th>
                            <th>Admin</th>
                            <th>Senin, 25 Februari</th>
                            <th></th>
                        </tr>
                    </tbody>
                    </table>
            </div>
            </div>
        </div> 
    </div>
</div>
@endsection

