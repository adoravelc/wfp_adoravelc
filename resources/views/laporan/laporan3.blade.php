@extends('components.sidebar')
@extends('layouts.app')
@section('content')
    <div class="container-table">
        <h1 class="text-center mb-5">Laporan 3: Makanan yang Harganya < 2000</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow p-3 mb-5 bg-body rounded">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Makanan</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Fakta Gizi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $food)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $food->name }}</td>
                            <td class="text-center">{{ $food->description }}</td>
                            <td class="text-center">{{ number_format($food->price, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $food->nutrition_facts }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('laporan') }}" class="btn-pink">Back to Laporan</a>
        </div>
    </div>
@endsection
