
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Uredi knjigu</title>
</head>
<body>
  @auth
    <form action="{{route('books.update', $book->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div>
        <label>Naslov: <br>
          <input type="text" name="title" id="title" value="{{old('title', $book->title)}}">
        </label>
        @error('title')
          <p style="color:Red">{{$message}}</p>    
        @enderror
      </div>
      <div>
        <label>Autor: <br>
          <input type="text" name="author" id="author" value="{{old('author', $book->author)}}">
        </label>
        @error('author')
          <p style="color:Red">{{$message}}</p>    
        @enderror
      </div>
      <div>
        <label>Godina: <br>
          <input type="text" name="year" id="year" value="{{old('year', $book->year)}}">
        </label>
        @error('year')
          <p style="color:Red">{{$message}}</p>    
        @enderror
      </div>
      <button type="submit">Završi uređivanje</button>
    </form>
  @else
    <p>Molimo prijavite se za uređivanje</p> 
  @endauth
</body>
</html>