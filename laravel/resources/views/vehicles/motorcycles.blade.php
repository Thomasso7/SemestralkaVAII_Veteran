<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterány</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
@vite('resources/js/search.js')
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="Obrazky/logo.jpg" class="logo" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Motorky</a>
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
            @if(Auth::user()->usertype == 'admin')
            <a href="{{url('add')}}">
                <button class="addbtn">Pridaj</button>
            </a>
            @endif
            @endauth
            <a href="{{url('cart')}}">
                <img width="45" src="{{asset('/Obrazky/cart.png')}}">
            </a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" id="search" placeholder="Vyhľadávanie" aria-label="Search">
                <button class="btn" type="submit">Hľadať</button>
            </form>
        </div>
    </div>
</nav>

@vite('resources/js/pagination.js')
<div id="motorcycles_data">
    @include('vehicles.motorcycles_data')
</div>

</body>
</html>
