<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<a class="admin" href="{{url('/')}}">
    <img src="{{asset('Obrazky/logo.jpg')}}" class="logo" alt="logo">
</a>
<div class="add_items">
    <form action="{{url('uploadSparePart')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-warning" role="alert">{{$error}}</div>
            @endforeach
        @endif
        <div>
            <label>Názov dielu</label>
            <input class="inputs" type="text" name="name" required>
        </div>
        <div>
            <label>Cena</label>
            <input type="text" name="price" required>
        </div>
        <label>Model vozidla</label>
        <select class="inputs" name="type">
            <option VALUE="Jawa">Jawa</option>
            <option VALUE="Simson">Simson</option>
            <option VALUE="Wartburg">Wartburg</option>
        </select>
        <div>
            <label>Obrázok</label>
            <input class="inputs" type="file" name="image" required>
        </div>
        <button class="addingbtn" type="submit">Pridaj diel</button>
    </form>
</div>
</body>
</html>
