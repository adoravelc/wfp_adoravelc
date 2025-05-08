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

                <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label fw-bold">Food Name</label>
                                <input type="text" name="name" class="form-control" id="name" 
                                    placeholder="Enter food name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="category_id" class="form-label fw-bold">Category</label>
                                <select name="category_id" class="form-control" id="category_id" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control" id="description" 
                            rows="3" placeholder="Enter food description" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="form-label fw-bold">Price (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="price" class="form-control" id="price" 
                                placeholder="Enter price" value="{{ old('price') }}" min="0" step="1" required>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="nutrition_facts" class="form-label fw-bold">Nutrition Facts</label>
                        <textarea name="nutrition_facts" class="form-control" id="nutrition_facts" 
                            rows="3" placeholder="Example: Protein 10g, Carbs 25g, Fat 5g, etc." required>{{ old('nutrition_facts') }}</textarea>
                    </div>

                    <div class="form-group" style="margin-top: 30px;">
                        <div class="d-flex gap-2">
                            <a href="{{ url('/daftar-makanan') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('judul-halaman', 'Tambah Makanan')
@section('judul-browser', 'Tambah Makanan')