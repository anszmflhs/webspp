@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <x-alert></x-alert>


        <h1 class="h3 mb-2 text-gray-800">Update Data Permintaan</h1>
        <a href="{{ route('permintaan.index') }}" class="btn btn-primary">Back</a>


        <div class="card shadow mb-4 mt-2">

            <div class="card-body">
                <form method="POST" action="{{ route('permintaan.update', $permintaans->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user_create">Name:</label>
                        <select class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                            id="user_create">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ ucwords($user->siswa->name) }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nis_create">NIS:</label>
                        <select class="form-control
                            id="nis_create">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ ucwords($user->siswa->nis) }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas_create">Jurusan:</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id"
                            id="kelas_create">
                            @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ ucwords($kls->jurusan) }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="spp_create">Nominal:</label>
                        <select class="form-control @error('spp_id') is-invalid @enderror" name="spp_id"
                            id="spp_create">
                            @foreach ($spps as $nominals)
                                <option value="{{ $nominals->id }}">{{ ucwords($nominals->nominal) }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bayar_create">Tanggal Bayar:</label>
                        <input type="date" class="form-control @error('tanggal_bayar') is-invalid @enderror"
                            name="tanggal_bayar">
                        @error('tanggal_bayar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_create">Status:</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                        </select>

                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save fa-fw"></i> SIMPAN
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
