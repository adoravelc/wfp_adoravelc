@extends('layouts.layout')
@section('content')
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Kategori</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
                <!-- <th>Foods</th> -->
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <!-- <td>
                        @foreach ($item->foods as $food)
                            <li>{{ $food->name }} - Rp{{ $food->price }}</li>
                        @endforeach
                    </td> -->
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-kategori-{{ $item->id }}">
                            See Details
                        </button>
                        <div class="modal fade" id="modal-kategori-{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modal-kategori-{{ $item->name }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal-kategori-{{ $item->id }}">Produk Kategori
                                            {{ $item->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($item->foods as $food)
                                            <li>{{ $food->name }} - Rp{{ $food->price }}</li>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('judul-halaman', 'Daftar Kategori')
@section('judul-browser', 'Daftar Kategori')

<!-- ini section kalo mau tiap page beda css, jadi ngelempar ini ke layout -->
<!-- @section('modelku')
<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
@endsection -->