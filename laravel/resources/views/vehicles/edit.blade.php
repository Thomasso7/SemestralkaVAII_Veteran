<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>
<div class="add_items">
    <form action="{{url('submitEdit', $vehicle->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Názov vozidla</label>
            <input type="text" name="title" value="{{$vehicle->title}}" required>
        </div>
        <div>
            <label>Popis</label>
            <textarea name="description" required>{{$vehicle->description}}</textarea>
        </div>
        <div>
            <label>Cena</label>
            <input type="text" name="price" value="{{$vehicle->price}}" required>
        </div>
        <label>Typ vozidla</label>
        <select name="type">
            <option VALUE={{$vehicle->type}}>{{$vehicle->type}}</option>
            @if($vehicle->type == 'Auto')
                <option VALUE="Motorka">Motorka</option>
            @else
                <option VALUE="Auto">Auto</option>
            @endif
        </select>
        <div>
            <label>Obrázok</label>
            <input type="file" name="image" >
        </div>
        <button type="submit">Uprav vozidlo</button>
    </form>
</div>
</body>
</html>
