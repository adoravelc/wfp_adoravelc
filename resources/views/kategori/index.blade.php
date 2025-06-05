@extends('layouts.layout')

@section('content')
    <div class="mb-4">
        <div class="d-flex">
            <a href="#" class="btn btn-custom d-inline-flex align-items-center ms-2" data-bs-toggle="modal"
                data-bs-target="#btnFormModal">
                <i class="fas fa-plus me-2"></i> Tambah Kategori
            </a>

            <a href="{{ route('categories.trashed') }}" class="btn btn-custom d-inline-flex align-items-center ms-2">
                <i class="fas fa-trash me-2"></i> Lihat Terhapus
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Kategori</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="produk-kategori" data-url="{{ url('ambil-produk-ajax/' . $item->id) }}"
                            data-id="{{ $item->id }}">
                            {{ $item->name }}
                            <div id="hasil-{{ $item->id }}"></div>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <button type="button" class="btn btn-details" data-bs-toggle="modal"
                                data-bs-target="#modal-kategori-{{ $item->id }}">
                                <i class="fas fa-search"></i> Details
                            </button>

                            <div class="modal fade" id="modal-kategori-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="modal-kategori-{{ $item->name }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-kategori-{{ $item->id }}">
                                                Produk Kategori {{ $item->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Makanan</th>
                                                        <th>Harga Makanan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->foods as $food)
                                                        <tr>
                                                            <td>{{ $food->name }}</td>
                                                            <td>Rp{{ $food->price }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>
                            <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('categories.destroy', $item->id) }}" class="btn btn-delete"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus {{ $item->name }}?');">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(".produk-kategori").click(function () {
            var urlku = $(this).data('url');
            var idkategori = $(this).data('id');

            $.ajax({
                url: urlku,
                success: function (result) {
                    $("#hasil-" + idkategori).html(result);
                }
            });
        });
    </script>
@endsection

@section('judul-halaman', 'Daftar Kategori')
@section('judul-browser', 'Daftar Kategori')

@push('modals')
    <div class="modal fade" id="btnFormModal" tabindex="-1" aria-labelledby="btnFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="btnFormModalLabel">Tambah Kategori Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan nama kategori" aria-describedby="nameHelp" required>
                            <div id="nameHelp" class="form-text text-muted">Silakan tulis nama kategori di sini.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
