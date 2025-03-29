@include('components.sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- @yield('modelku') -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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