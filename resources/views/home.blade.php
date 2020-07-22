@extends('app')

@section('title', 'Minerva')

@section('content')

<header>
    <br><h1>Gra przeglądarkowa z kryształami w tle...</h1>
</header>

<header>
    <br><h1> Zaloguj się lub zarejestruj i rozpocznij przygodę z Minervą!</h1>
</header>

@if (session('deleteSuccess'))
    <div class="alert alert-success">
        Konto zostało pomyślnie usunięte. Dziękujemy za przygodę!
    </div>
@endif

<div class="sign md-4">
    <div class="col-10 col-sm-5 col-lg-3 offset-1 offset-lg-3 pl-2 pr-0 pr-sm-2 pr-lg-3 float-left">
        <a href="/login"><p>Logowanie</p></a>
    </div>
    <div class="col-10 col-sm-5 col-lg-3 offset-1 offset-sm-0 pl-2 pr-0 pr-sm-2 pr-lg-3 float-left">
        <a href="/register"><p>Rejestracja</p></a>
    </div>
</div>

<br><br><br><div><h1>Prześledż również samouczek, by poznać grę od podszewki!</h1></div>

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
        <a href="/tutorial"><p>Samouczek</p></a>
    </div><br>
</div><br>


@endsection