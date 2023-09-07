@extends('layouts.master')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('sbadmin') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sbadmin/vendor/sweetalert2/sweetalert2.min.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <x-alert></x-alert>
        <h1 class="h3 mb-2 text-gray-800">History Pembayaran</h1>
        <div class="mb-4">
            <a href="{{ route('bayarsekarang.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus fa-fw"></i> Tambah Pembayaran
            </a>
        </div>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Jurusan</th>
                                <th>Nominal</th>
                                <th>Tanggal Bayar</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('sbadmin') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('sbadmin/vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Page level custom scripts -->
    @include('bayarsekarang.ajax')
@endpush
