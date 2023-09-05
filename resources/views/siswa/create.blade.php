@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <x-alert></x-alert>


        <h1 class="h3 mb-2 text-gray-800">Tambah Data Siswa</h1>
        <a href="{{ route('siswa.index') }}" class="btn btn-primary">Back</a>


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
                        <label for="nisn_create">NISN:</label>
                        <input type="" name="nisn" id="nisn_create"
                            class="form-control @error('nisn') is-invalid @enderror">
                        @error('nisn')
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
                        <label for="email_create">Email:</label>
                        <input type="" name="email" id="email_create"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
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
                        <label for="alamat">Alamat:</label>
                        <input type="" name="alamat" id="alamat_create"
                            class="form-control @error('alamat') is-invalid @enderror">
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp_create">No Telp:</label>
                        <input type="" name="no_telp" id="no_telp_create"
                            class="form-control @error('no_telp') is-invalid @enderror">
                        @error('no_telp')
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
