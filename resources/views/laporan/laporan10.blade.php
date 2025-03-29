@extends('components.sidebar')
@extends('layouts.app')
@section('content')
    <div class="container-table">
        <h1 class="text-center mb-5">Laporan 10: Makanan Terlaris per Kategori Berdasarkan Total Penjualan</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow p-3 mb-5 bg-body rounded">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Nama Makanan</th>
                        <th class="text-center">Total Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $category)
                        <tr>
                            <td class="text-center">{{ (int) $key + 1 }}</td>
                            <td class="text-center">{{ $category->category_name }}</td>
                            <td class="text-center">{{ $category->food_name }}</td>
                            <td class="text-center">Rp. {{ number_format($category->total_sales, 0, ',', '.') }}</td>
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