@extends('components.sidebar')
@extends('layouts.app')
@section('content')
    <div class="container-table">
        <h1 class="text-center mb-5">Laporan 7: Kategori Makanan yang Paling Laku dalam 3 Bulan Terakhir</h1>

        @if($datas->isEmpty())
            <p class="text-center">Tidak ada data kategori makanan yang terjual dalam 3 bulan terakhir.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered shadow p-3 mb-5 bg-body rounded">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Total Kuantitas Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $category)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $category->name }}</td>
                                <td class="text-center">{{ $category->total_quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ url('laporan') }}" class="btn-pink">Back to Laporan</a>
        </div>
    </div>
@endsection
