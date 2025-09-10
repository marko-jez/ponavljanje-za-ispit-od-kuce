<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detalji o knjizi</title>
</head>
<body>
  <h1>{{$book->title}}</h1>
  <p><strong>Autor:</strong> {{$book->author}}</p>
  <p><strong>Godina:</strong> {{$book->year}}</p>
  <br>
  <a href="{{route('books.edit', $book->id)}}" style="color:blue">Uredi knjigu</a>
  <br><br>
  <a href="{{ route('books.index')}}" style="color:blue">Nazad na spisak knjiga</a>
</body>
</html>