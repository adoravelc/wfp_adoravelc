<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>adoravelc's Blog | Home</title>
</head>

<body>

    <div class="container text-center">
        <h1>Welcome to adoravelc's Blog</h1>

        <div class="card">
            <div class="card-header">Menu</div>
            <div class="card-body">
                <a href="{{ url('/about') }}" class="btn btn-custom">About</a>
                <a href="{{ url('/blog') }}" class="btn btn-custom">Blog</a>
                <a href="{{ url('/laporan') }}" class="btn btn-custom">Reports</a>
            </div>
        </div>

        <footer>
            <p>Powered by adoravelc | &copy; 2025</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
