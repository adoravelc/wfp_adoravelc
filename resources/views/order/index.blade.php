@extends('layouts.layout')
@section('content')
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tanggal Dibuat</th>
                <th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-center">{{ $item->date }}</td>
                    <td class="text-center">{{ number_format($item->grand_total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('judul-halaman', 'Daftar Order')
@section('judul-browser', 'Daftar Order')

<!-- ini section kalo mau tiap page beda css, jadi ngelempar ini ke layout -->
<!-- @section('modelku')
<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
@endsection -->