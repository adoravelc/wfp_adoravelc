@extends('layouts.layout')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-custom">
            <i class="fas fa-plus"></i> Create Category
        </a>
    </div>
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
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td class="produk-kategori" data-url="{{url('ambil-produk-ajax/' . $item->id)}}" data-id="{{ $item->id }}">
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
                                            <h1 class="modal-title fs-5" id="modal-kategori-{{ $item->id }}">Produk Kategori
                                                {{ $item->name }}
                                            </h1>
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                onclick="return confirm('Are you sure to delete {{ $item->id }} - {{ $item->name }} ? ');">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="tryJS" style="display: none">You just clicked a button</div>
    <script>
        $("#myJSBtn").click(function () {
            alert($('#tryJS').text());
            // $('#tryJS').show();
        });

        $(".produk-kategori").click(function () {
            var urlku = $(this).attr('data-url');
            var idkategori = $(this).attr('data-id');
            // alert(urlku);
            $.ajax({
                url: urlku,
                success: function (result) {
                    $("#hasil-" + idkategori).html(result);
                }
            });
        });
    </script>
@endsection
@section('judul-halaman', 'Category List')
@section('judul-browser', 'Category List')