<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sve knjige</title>
</head>
<body>
  <h2>Lista svih knjiga korisnika <strong>{{$user->name}}</strong></h2>

  <ul>
    @forelse ($books as $book)
      <li>{{$book->title}} - {{$book->author}} - {{$book->year}}
        <form action="{{route('books.destroy', $book->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit">Obriši knjigu</button>
        </form> 
        <a href="{{route('books.show', $book->id)}}" style="color:blue">Detalji o knjizi</a>
        <hr>
      </li>
    @empty
      <p>Korisnik nema niti jednu knjigu</p>
    @endforelse
  </ul>

  <br><br>

  <a href="{{route('books.create')}}" style="color:green">Dodaj novu knjigu</a>
</body>
</html>