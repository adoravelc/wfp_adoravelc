@extends('layouts.layout')
@section('content')

    <div class="mb-4">
        <div class="d-flex">
            <a href="{{ route('foods.create') }}" class="btn btn-custom d-inline-flex align-items-center me-2">
                <i class="fas fa-plus me-2"></i> Tambah Makanan
            </a>
            <a href="{{ route('foods.trashed') }}" class="btn btn-custom d-inline-flex align-items-center me-2">
                <i class="fas fa-trash me-2"></i> Lihat Terhapus
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <th>Id</th>
            <th>Nama Makanan</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <!-- <th>Gizi</th> -->
            <th>Kategori</th>
            <th>Details</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        @foreach ($foods as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>Rp{{ $item->price }}</td>
                <td>{{ $item->category->name }}</td>
                <!-- <td>{{ $item->nutrition_facts }}</td> -->

                <td>
                    <button type="button" class="btn btn-details" data-bs-toggle="modal"
                        data-bs-target="#modal-food-{{ $item->id }}">
                        <i class="fas fa-search"></i> Details
                    </button>

                    <!-- <button type="button" class="btn btn-pink" data-bs-toggle="modal"
                                                data-bs-target="#modal-kategori-{{ $item->id }}">
                                                <i class="fas fa-search"></i> See Details
                                            </button> -->
                    <div class="modal fade" id="modal-food-{{ $item->id }}" tabindex="-1"
                        aria-labelledby="modal-food-{{ $item->nutrition_facts }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modal-food-{{ $item->id }}">Nutrition Facts
                                        {{ $item->name }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            {{ $item->nutrition_facts }}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <a href="{{ route('foods.edit', $item->id) }}" class="btn btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </td>

                <td>
                    <a href="{{ route('foods.destroy', $item->id) }}" class="btn btn-delete"
                        onclick="return confirm('Are you sure to delete {{ $item->id }} - {{ $item->name }} ? ');">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </td>

            </tr>
        @endforeach
    </table>
@endsection
@section('judul-halaman', 'Food List')
@section('judul-browser', 'Food List')