@extends('components.sidebar')
@extends('layouts.app')
@section('content')
    <div class="container-table">
        <h1 class="text-center mb-5">Laporan 4: Makanan dan Kategorinya yang pernah laku lebih dari 2 porsi dalam satu order</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow p-3 mb-5 bg-body rounded">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Makanan</th>
                        <th class="text-center">Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $food)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $food->food_name }}</td>
                            <td class="text-center">{{ $food->category_name }}</td>
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
