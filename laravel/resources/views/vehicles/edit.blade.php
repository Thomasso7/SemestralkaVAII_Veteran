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
<div class="add_items">
    <form action="{{url('submitEdit', $vehicle->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-warning" role="alert">{{$error}}</div>
            @endforeach
        @endif
        <div>
            <label>Názov vozidla</label>
            <input class="inputs" type="text" name="title" value="{{$vehicle->title}}" required>
        </div>
        <div>
            <label>Popis</label>
            <textarea class="inputs" name="description" required>{{$vehicle->description}}</textarea>
        </div>
        <div>
            <label>Cena</label>
            <input type="text" name="price" value="{{$vehicle->price}}" required>
        </div>
        <label>Typ vozidla</label>
        <select class="inputs" name="type">
            <option VALUE={{$vehicle->type}}>{{$vehicle->type}}</option>
            @if($vehicle->type == 'Auto')
                <option VALUE="Motorka">Motorka</option>
            @else
                <option VALUE="Auto">Auto</option>
            @endif
        </select>
        <div>
            <label>Obrázok</label>
            <input class="inputs" type="file" name="image" >
        </div>
        <button type="submit">Uprav vozidlo</button>
    </form>
</div>
</body>
</html>
