<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Order Type</title>
</head>

<body>
    <div class="carousel-inner">
        <div class="d-flex justify-content-center align-items-center" style="height: 300px; background-color: #f8f9fa;">
            <a href="{{ url('/menu/dinein') }}">
                <button>Dine In</button>
            </a>
        </div>
        <a href="{{ url('/menu/takeaway') }}">
            <a href="{{ url('/menu/takeaway') }}">
                <button>Take Away</button>
            </a>
    </div>
    <br><br>
    <a href="{{ url('/welcome') }}">
        <button>Go Back</button>
    </a>
    </div>
</body>

</html>