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
        <a href="{{ route('daftar-kategori') }}" class="btn btn-custom">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Kategori</th>
                    <th>Tanggal Dihapus</th>
                    <th>Restore</th>
                    <th>Hapus Permanen</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->deleted_at->format('d M Y H:i') }}</td>
                        <td>
                            <a href="{{ route('categories.restore', $item->id) }}" class="btn btn-edit">
                                <i class="fas fa-trash-restore"></i> Pulihkan Kategori
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('categories.force-delete', $item->id) }}" class="btn btn-delete"
                                onclick="return confirm('PERHATIAN! Kategori {{ $item->name }} akan dihapus permanen. Lanjutkan?');">
                                <i class="fas fa-times-circle"></i> Hapus Permanen
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(count($categories) == 0)
        <div class="alert alert-info">Tidak ada kategori yang terhapus</div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setupLiveSearch('trashedCategorySearch', '#tableBody');
        });
    </script>
@endsection
@section('judul-halaman', 'Kategori yang Terhapus')
@section('judul-browser', 'Kategori yang Terhapus')