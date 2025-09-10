<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kreiranje nove knjige</title>
</head>
<body>
  @auth
    <form action="{{route('books.store')}}" method="POST">
    @csrf 
    <div>
      <label>Naslov: <br>
        <input type="text" name="title" id="title" value="{{old('title')}}">
      </label>
      @error('title')
        <p style="color:Red">{{$message}}</p>    
      @enderror
      </div>
      <div>
        <label>Autor: <br>
          <input type="text" name="author" id="author" value="{{old('author')}}">
        </label>
        @error('author')
          <p style="color:Red">{{$message}}</p>    
        @enderror
      </div>
      <div>
        <label>Godina: <br>
          <input type="text" name="year" id="year" value="{{old('year')}}">
        </label>
        @error('year')
          <p style="color:Red">{{$message}}</p>    
        @enderror
      </div>
      <button type="submit">Kreiraj novu knjigu</button>
    </form>
  @else
    <p>Molimo prijavite se</p>
    <a href="{{route('login.login')}}"></a>
  @endauth
  

 
</body>
</html>