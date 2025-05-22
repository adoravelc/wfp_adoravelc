@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    <!-- @method('PUT') -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-bold">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Enter category name" value="{{ $category->name }}" required>
                    </div>
                    <div class="form-group" style="margin-top: 30px;">
                        <div class="d-flex gap-2">
                            <a href="{{ url('/daftar-kategori') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('judul-halaman', 'Edit Category')
@section('judul-browser', 'Edit Category')
