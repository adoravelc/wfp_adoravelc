@extends('components.sidebar')
@extends('layouts.app')
@section('content')
    <div class="container-table">
        <h1 class="text-center mb-5">Laporan 6: Order yang grand totalnya lebih besar dari rata-rata grand total order yang
            ada</h1>
        <div class="text-center mb-4">
            <strong>Rata-rata Grand Total: Rp. {{ number_format($averageGrandTotal, 0, ',', '.') }}</strong>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered shadow p-3 mb-5 bg-body rounded">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID Order</th>
                        <th class="text-center">Tanggal Dibuat</th>
                        <th class="text-center">Grand Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $order)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $order->id }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                            <td class="text-center">Rp. {{ number_format($order->grand_total, 0, ',', '.') }}</td>
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