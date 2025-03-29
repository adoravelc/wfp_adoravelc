@extends('layouts.layout')
@section('content')
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama Kategori</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal Diubah</th>
            <th>Foods</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    @foreach ($item->foods as $food)
                        <li>{{ $food->name }} - Rp{{ $food->price }}</li>
                    @endforeach
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