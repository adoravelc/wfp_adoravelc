@extends('layouts.layout')

@section('content')
    <div class="insert-form-container">
        <!-- <h1>Create Category</h1> -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> There's a mistake in your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Insert category name"
                    value="{{ old('name') }}" required>
            </div>

            <div class="form-group" style="display: flex; gap: 10px; margin-top: 30px;">
                <button type="button" onclick="window.location.href='{{ url('/daftar-kategori') }}'" class="btn-custom">
                    Kembali
                </button>
                <button type="submit" class="btn-custom">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@section('judul-halaman', 'Tambah Kategori')
@section('judul-browser', 'Tambah Kategori')