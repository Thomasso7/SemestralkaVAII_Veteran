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
    <form action="{{url('uploadVehicle')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Názov vozidla</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Popis</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label>Cena</label>
            <input type="text" name="price" required>
        </div>
        <label>Typ vozidla</label>
        <select name="type">
            <option VALUE="Motorka">Motorka</option>
            <option VALUE="Auto">Auto</option>
        </select>
        <div>
            <label>Obrázok</label>
            <input type="file" name="image" required>
        </div>
        <button type="submit">Pridaj vozidlo</button>
    </form>
</div>
</body>
</html>
