<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> <!--ini basically ambil dari folder public jadi dia bisa di apply ke view apapun-->
    <title>adoravelc's Blog | About</title>
</head>
<body>
    <h1>About Page</h1>
    <a href="{{ url('/') }}">
        <button>Go Back</button>
    </a>
    <h3>
        <?php echo $name;?>
    </h3>
    <p>
        <?php echo $email;?>
    </p>
    <img src="{{$image}}" alt="adoravelc" class="blog-img"> <!--jadi {{}} itu sintax untuk di blade.php gituh untuk shortcut php wkwkwk-->
</body>
</html>