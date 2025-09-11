@extends('layouts.app')

@section('title', 'Prijava korisnika')

@section('content')

  @auth
  <div>
    <p>Dobrodošli, {{ auth()->user()->name }}!</p>
    <form method="POST" action="{{route('logout')}}">
        @csrf
        <button type="submit" class="btn btn-primary">Odjava</button>
    </form>
  </div> 
  <br><br>
    <a href="{{route('books.index')}}" style="color:white" class="btn btn-info" >Sve knjige</a>
  @else
    <h1>Dobrodošli, molimo vas da se prijavite za nastavak</h1>
    <br>

    @error('login_error')
      <div style="color:red">{{ $message }}</div>
    @enderror

    <form action="{{route('process')}}" method="POST">
      @csrf
      <label>Email: <br>
        <input type="email" name="email" id="email" value="{{old('email')}}">
      </label> <br>
      @error('email')
        <p style="color:red">{{$message}}</p>     
      @enderror
      <label>Lozinka: <br>
        <input type="password" name="password" id="password">
      </label> <br> <br>
      @error('password')
        <p style="color:red">{{$message}}</p>     
      @enderror
      <button type="submit" class="btn btn-primary">Prijavi se</button>
    </form>
  @endauth

@endsection  
