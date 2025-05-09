@extends('layouts.layout')
@section('content')
    <div class="container text-center">
        <!-- <h1>Welcome to adoravelc's WFP Project</h1> -->

        <!-- Lorem Ipsum content -->
        <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pretium lacus a est viverra, in
            lacinia orci congue. Sed tincidunt purus eu sollicitudin sollicitudin. Nam vitae eros urna. Donec ut purus in
            felis sollicitudin euismod. Integer malesuada, lorem in euismod euismod, nisi nisi tincidunt tortor, vitae
            volutpat nunc leo et velit. Ut tristique, turpis et convallis fermentum, nisi quam posuere libero, vel suscipit
            purus felis vel turpis.</p>

        <p class="mt-2">Curabitur pretium sit amet orci id interdum. Donec consequat arcu vitae eros lacinia, id congue erat
            tincidunt. Nulla facilisi. Etiam fringilla magna vitae nisi euismod, non iaculis ligula placerat. Sed sed libero
            a ante viverra dapibus eget id risus. Proin ac nulla vestibulum, ultricies augue ac, malesuada felis.</p>

        <!-- Image Carousel -->
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.pinimg.com/736x/b1/41/9e/b1419e4b64507e224f8bab227a09ecec.jpg" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/39/13/2c/39132cae07d396c21fb05c088a42e420.jpg" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/28/a3/06/28a3063f0ccb972cb0e2cd5cffd995d5.jpg" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/474x/64/d4/e8/64d4e8478e68e1d0b6bb6991d0ff79e9.jpg" class="d-block w-100"
                        alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
@section('judul-halaman', 'WFP | adoravelc')
@section('judul-browser', 'WFP | adoravelc')