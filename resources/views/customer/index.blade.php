@extends('layouts.layout')
@section('content')
<table border="1">
    <thead>
        <th>Id</th>
        <th>Nama</th>
        <th>Email</th>
    </thead>
    @foreach ($customers as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
        </tr>
    @endforeach
</table>
@endsection
@section('judul-halaman', 'Daftar Customer')
@section('judul-browser', 'Daftar Customer')