@extends('components.sidebar')
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <div class="container">
        <h1 class="text-center mb-5">Laporan Restoran</h1>
        <div class="row">
            <!-- Card 1: Laporan kategori Lunch -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">1. {{ Str::limit('Semua makanan yang berada di kategori Lunch', 15) }}</h5>
                        <a href="/laporan1" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Laporan makanan dengan deskripsi mengandung angka 1 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">2.
                            {{ Str::limit('Semua nama makanan yang deskripsinya mengandung angka 1', 15) }}
                        </h5>
                        <a href="/laporan2" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Laporan makanan dengan harga di bawah 2000 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">3. {{ Str::limit('Semua nama makanan yang harganya di Bawah 2000', 15) }}
                        </h5>
                        <a href="/laporan3" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Laporan makanan dan kategori yang pernah laku lebih dari 2 porsi dalam satu order -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">4.
                            {{ Str::limit('Makanan dan kategorinya yang pernah laku lebih dari 2 porsi dalam satu order', 15) }}
                        </h5>
                        <a href="/laporan4" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 5: Laporan total nominal order Januari - Maret 2025 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">5.
                            {{ Str::limit('Total nominal order yang didapat oleh restoran pada bulan januari hingga maret 2025', 15) }}
                        </h5>
                        <a href="/laporan5" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 6: Laporan ID order, tanggal, dan grand total lebih besar dari rata-rata -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">6.
                            {{ Str::limit('Id order, tanggal, dan grand totalnya, dimana grand totalnya lebih besar dari rata-rata grand total order yang ada', 15) }}
                        </h5>
                        <a href="/laporan6" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 7: Laporan kategori makanan yang paling laku dalam 3 bulan terakhir -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">7.
                            {{ Str::limit('Kategori makanan yang paling laku (dalam hal kuantitas) pada 3 bulan terakhir', 15) }}
                        </h5>
                        <a href="/laporan7" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 8: Laporan kategori nama, tanggal, dan grand total per kategori -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">8.
                            {{ Str::limit('Nama kategori, tanggal dibuatnya, dan grand total penjualan untuk per kategori tersebut', 15) }}
                        </h5>
                        <a href="/laporan8" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 9: Laporan 5 makanan termahal -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">9. {{ Str::limit('5 makanan termahal yang dimiliki oleh restoran', 15) }}
                        </h5>
                        <a href="/laporan9" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Card 10: Laporan kategori makanan yang paling bernilai -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">10.
                            {{ Str::limit('Nama kategori dan nama makanan dari kategori tersebut yang paling bernilai (dilihat dari total nominal order yang pernah ada untuk makanan tersebut) beserta total nominal tersebut', 15) }}
                        </h5>
                        <a href="/laporan10" class="btn btn-pink">Lihat Laporan</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
    @section('judul-halaman', 'Restaurant Reports')
    @section('judul-browser', 'Restaurant Reports')