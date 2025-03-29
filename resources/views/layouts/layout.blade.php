@include('components.sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul-browser')</title>
    @yield('modelku')
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
</head>

<body>
    <div>
        <h1>@yield('judul-halaman')</h1>
        <!-- ini pemanggilan controller -->
        @yield('content')
    </div>
    <!-- <footer>
        <p>Powered by adoravelc | &copy; 2025</p>
    </footer> -->
</body>


</html>