@extends('layouts.app')

@section('title', 'Sve knjige')

@section('content')

  <h2>Lista svih knjiga korisnika <strong>{{$user->name}}</strong></h2>

  <ul>
    @forelse ($books as $book)
      <li>{{$book->title}} - {{$book->author}} - {{$book->year}}
        <form action="{{route('books.destroy', $book->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-primary" >Obriši knjigu</button>
        </form> 
        <br>
        <a href="{{route('books.show', $book->id)}}" style="color:blue" class="btn btn-outline-primary" >Detalji o knjizi</a>
        <hr>
      </li>
      @if ($profile)
          <h3>Podaci o korisniku</h3>
        <p style="font-style: italic">Korisnik: {{$user->name}}</p>
        <p style="font-style: italic">Username: {{$profile->username}}</p>
        <p style="font-style: italic">Adresa: {{$profile->address}}</p>
        <p style="font-style: italic">Broj mobitela: {{$profile->phone}}</p>
      @endif
    @empty
      <p>Korisnik nema niti jednu knjigu</p>
    @endforelse
  </ul>

  <br><br>

  <a href="{{route('books.create')}}" style="color:green">Dodaj novu knjigu</a>
  <br>
  <a href="{{route('login')}}">Početna</a>

@endsection  