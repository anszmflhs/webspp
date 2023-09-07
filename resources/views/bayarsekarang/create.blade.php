@php
    use App\Models\Siswa;
@endphp

@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <x-alert></x-alert>


        <h1 class="h3 mb-2 text-gray-800">Tambah Data Pembayaran</h1>
        <a href="{{ route('bayarsekarang.index') }}" class="btn btn-primary">Back</a>
        @php
            $dataSiswa =  Siswa::where('id', auth()->user()->siswa->id)->first();
        @endphp
        <div class="card-body">
            <form method="POST" action="{{ route('bayarsekarang.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    @foreach ($users as $user)
                        @if ($user->id === auth()->user()->id)
                            {{-- <label for="user_create{{ $user->id }}">Name:</label> --}}
                            <input type="text" class="form-control" id="user_create" name="user_id" hidden
                                value="{{ auth()->user()->siswa->id }}">
                            <br>
                        @endif
                    @endforeach
                </div>
                <div class="form-group">
                    {{-- <label for="kelas_create">Jurusan:</label> --}}
                    <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" id="kelas_create" hidden >
                        @foreach ($kelas as $kls)
                            @if ($kls->id == $dataSiswa->kelas_id)
                                <option value="{{ $kls->id }}">{{ ucwords($kls->jurusan) }}</option>
                            @endif

                        @endforeach
                    </select>

                    {{-- @foreach ($kelas as $kls)
                        @if ($kls->kelas_id == $dataSiswa->kelas_id)
                            <input type="text" class="form-control" name="kelas_id" id="kelas_create" value="{{ $kls->id }}">
                        @endif

                    @endforeach
                    @error('kelas_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="spp_create">Nominal:</label>
                    <select class="form-control @error('spp_id') is-invalid @enderror" name="spp_id" id="spp_create" @readonly(true)>
                        @foreach ($spps as $nominals)
                            @if ($nominals->kelas_id == $dataSiswa->kelas_id )
                            <option value="{{ $nominals->id }}">{{ ucwords($nominals->nominal) }}</option>
                            @endif

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
                    <label for="bukti_pembayaran_create">Bukti Pembayaran:</label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran_create"
                        class="form-control @error('bukti_pembayaran') is-invalid @enderror">
                    @error('bukti_pembayaran')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="status_create">Status:</label>
                    <input type="text" class="form-control" id="status_create" name="status" value="Unpaid" readonly>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save fa-fw"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
