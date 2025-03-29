@extends('layouts.layout')
@section('content')
<table border="1">
    <thead>
        <th>Id</th>
        <th>Nama Makanan</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Gizi</th>
        <th>Kategori</th>
    </thead>
    @foreach ($foods as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>Rp{{ $item->price }}</td>
            <td>{{ $item->nutrition_facts }}</td>
            <td>{{ $item->category->name }}</td>
        </tr>
    @endforeach
</table>
@endsection
@section('judul-halaman', 'Daftar Makanan')
@section('judul-browser', 'Daftar Makanan')