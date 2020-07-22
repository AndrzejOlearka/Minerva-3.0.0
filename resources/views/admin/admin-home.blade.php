@extends('admin/admin')

@section('title', 'Minerva - Admin Panel')

@section('content')

<header>
    <br><h1>Wybierz Czym chcesz zarządzać!</h1>
</header>

<div class="sign md-4">
    <div class="col-10 col-sm-5 col-lg-3 offset-1 offset-lg-3 pl-2 pr-0 pr-sm-2 pr-lg-3 float-left">
        <a href="/admin/users"><p>Użytkownicy</p></a>
    </div>
    <div class="col-10 col-sm-5 col-lg-3 offset-1 offset-sm-0 pl-2 pr-0 pr-sm-2 pr-lg-3 float-left">
        <a href="/admin/settings"><p>Ustawienia</p></a>
    </div>
</div>

<header>
    <br><h1>Miłej pracy!</h1>
</header>

<div class="sign col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
    @guest
        <a href="/login"><p>Logowanie</p></a>
    @endguest
    @auth
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <p>Wyloguj</p>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endauth
</div>

@endsection