<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ5bH7S8Rjl0t3QxV6p+W8l0Zriiw3H9t6k7z1b2g6gqE5sEr6wleU1+IekD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="d-flex justify-content-center align-items-center" style="height: 300px; background-color: #f8f9fa;">
        <h1>Welcome!</h1>
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center align-items-center" style="height: 300px; background-color: #e9ecef;">
        <a href="{{ url('/before_order') }}">
            <button class="btn btn-primary">Want to Order?</button>
        </a>
      </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center align-items-center" style="height: 300px; background-color: #f8f9fa;">
        <a href="{{ url('/administration') }}">
            <button class="btn btn-secondary">Administration</button>
        </a>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBfA9gF1Vgk9jRz7Dfa2no7gSo7Jo+zZg1T8v+K9yC4rSfK8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0z5Y5saC8LtSEsKxXzvZdM0xPp3A8hbiKkgR18mnkjQOq6F7" crossorigin="anonymous"></script>

</body>
</html>
