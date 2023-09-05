@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <x-alert></x-alert>


        <h1 class="h3 mb-2 text-gray-800">Update Data Admin</h1>
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Back</a>


        <div class="card shadow mb-4 mt-2">

            <div class="card-body">
                <form method="POST" action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="photo_create">Foto diri:</label>
                        <input type="file" name="photo" id="photo_create"
                            class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name_edit">Name:</label>
                        <input type="" value="{{ $admin->user->name }}" name="name" id="name_edit" class="form-control"
                    </div>
                    <div class="form-group">
                        <label for="email_create">Email:</label>
                        <input type="" name="email" value="{{ $admin->user->email }}" id="email_create"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contact_create">Contact:</label>
                        <input type="" name="contact" value="{{ $admin->contact }}" id="contact_create"
                            class="form-control @error('contact') is-invalid @enderror">
                        @error('contact')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender_create">Jenis Kelamin:</label>
                        <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                            <option value="L" {{ $admin->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $admin->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>

                        @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hire_date_create">Tanggal Diterima:</label>
                        <input type="date" value="{{ $admin->hire_date }}" class="form-control @error('hire_date') is-invalid @enderror"
                            name="hire_date">
                        @error('hire_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address_create">Address:</label>
                        <textarea class="form-control" name="address">{{ $admin->address }}</textarea>
                        @error('address')
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
