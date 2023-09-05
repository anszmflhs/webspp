@extends('layouts.masters')

@section('content')
    <div class="container-fluid">
        <x-alert></x-alert>

        <a href="{{ route('/') }}" class="btn btn-primary">Back</a>


        <div class="card shadow mb-4 mt-2">

            <div class="card-body">
                <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name_create">Name:</label>
                        <input type="" name="name" id="name_create"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nis_create">NIS:</label>
                        <input type="" name="nis" id="nis_create"
                            class="form-control @error('nis') is-invalid @enderror">
                        @error('nis')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jurusan_create">Jurusan:</label>
                        <select class="form-control @error('jurusan') is-invalid @enderror" name="jurusan">
                            <option value="TKJ">TKJ</option>
                            <option value="RPL">RPL</option>
                            <option value="DMM">DMM</option>
                        </select>
                        @error('jurusan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal:</label>
                        <input type="" name="nominal" id="nominal_create"
                            class="form-control @error('nominal') is-invalid @enderror">
                        @error('nominal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bukti_pembayaran_create">Bukti Pembayaran:</label>
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran_create"
                            class="form-control @error('bukti_pembayaran') is-invalid @enderror">
                        @error('bukti_pembayaran')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_create">Status:</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="unpaid">Unpaid</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save fa-fw"></i> Bayar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
