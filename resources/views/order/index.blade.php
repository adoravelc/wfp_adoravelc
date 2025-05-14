@extends('layouts.layout')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            + Create Order
        </a>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th> <!-- Kolom baru -->
                <th>Tanggal Dibuat</th>
                <th>Status</th>
                <th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-center">
                        {{ $item->user->name ?? 'Guest' }}
                    </td>
                    <td class="text-center">{{ $item->date }}</td>
                    <td class="text-center">
                        @if($item->status == 0)
                            <span class="badge bg-warning text-dark">Not Done</span>
                        @elseif($item->status == 1)
                            <span class="badge bg-success">Done</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>
                    <td class="text-center">{{ number_format($item->grand_total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
@section('judul-halaman', 'Order List')
@section('judul-browser', 'Order List')

<!-- ini section kalo mau tiap page beda css, jadi ngelempar ini ke layout -->
<!-- @section('modelku')
<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
@endsection -->