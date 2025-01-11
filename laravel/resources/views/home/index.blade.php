<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterány</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{asset('Obrazky/logo.jpg')}}" class="logo" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('motorcycles')}}">Motorky</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('cars')}}">Autá</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
                        Náhradné diely
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-i" href="#">Pionier</a></li>
                        <li><a class="dropdown-i" href="#">Simson</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-i" href="#">Wartburg</a></li>
                    </ul>
                </li>
            </ul>
            @auth()
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <input type="submit" class="addbtn" value="Odhlásiť">
            </form>
            @endauth
            @guest()
            <a href="{{url('login')}}">
                <button class="addbtn" >Prihlásiť</button>
            </a>
            <a href="{{url('register')}}">
                <button class="addbtn" >Registrovať</button>
            </a>
            @endguest
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Vyhľadávanie" aria-label="Search">
                <button class="btn" type="submit">Hľadať</button>
            </form>

        </div>
    </div>
</nav>

</body>
</html>
