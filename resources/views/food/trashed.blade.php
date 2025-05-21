@extends('layouts.layout')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('daftar-makanan') }}" class="btn btn-custom">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Makanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Tanggal Dihapus</th>
                    <th>Restore</th>
                    <th>Hapus Permanen</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($foods as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>Rp{{ $item->price }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->deleted_at->format('d M Y H:i') }}</td>
                        <td>
                            <a href="{{ route('foods.restore', $item->id) }}" class="btn btn-edit">
                                <i class="fas fa-trash-restore"></i> Pulihkan Makanan
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('foods.force-delete', $item->id) }}" class="btn btn-delete"
                                onclick="return confirm('PERHATIAN! Makanan {{ $item->name }} akan dihapus permanen. Lanjutkan?');">
                                <i class="fas fa-times-circle"></i> Hapus Permanen
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(count($foods) == 0)
        <div class="alert alert-info">Tidak ada makanan yang terhapus</div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof setupLiveSearch === 'function') {
                setupLiveSearch('trashedFoodSearch', '#tableBody');
            }
        });
    </script>
@endsection
@section('judul-halaman', 'Makanan yang Terhapus')
@section('judul-browser', 'Makanan yang Terhapus')