@extends('layouts.app')

@section('title', 'Detalji knjige')

@section('content')


<body>
  <h1>{{$book->title}}</h1>
  <p><strong>Autor:</strong> {{$book->author}}</p>
  <p><strong>Godina:</strong> {{$book->year}}</p>
  <br>
  <a href="{{route('books.edit', $book->id)}}" style="color:blue" >Uredi knjigu</a>
  <br><br>
  <a href="{{ route('books.index')}}" style="color:blue">Nazad na spisak knjiga</a>
</body>
</html>

@endsection