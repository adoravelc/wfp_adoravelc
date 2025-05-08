@extends('layouts.layout')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="mb-3">
        <a href="{{ route('foods.create') }}" class="btn btn-primary">
            + Create Food
        </a>
    </div>
<table border="1">
    <thead>
        <th>Id</th>
        <th>Nama Makanan</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <!-- <th>Gizi</th> -->
        <th>Kategori</th>
        <th>Details</th>
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
             <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-food-{{ $item->id }}">
                            See Details
                        </button>
                        <div class="modal fade" id="modal-food-{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modal-food-{{ $item->nutrition_facts }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal-food-{{ $item->id }}">Nutrition Facts
                                            {{ $item->name }}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
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
            
        </tr>
    @endforeach
</table>
@endsection
@section('judul-halaman', 'Daftar Makanan')
@section('judul-browser', 'Daftar Makanan')