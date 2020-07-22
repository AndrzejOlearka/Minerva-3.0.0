

@extends('app')

@section('title', 'Minerva - Rejestracja')

@section('content')

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="registration.php"><p>Rejestracja</p></a></div>
</div><br>

<header>
    <h1> Zarejestruj się by móc brać udział w poszukiwaniach!</h1>
</header>

<form action="{{ route('register') }}" method="post" class="row form_registration col-10 col-sm-10 col-lg-6 offset-1 offset-sm-1 offset-lg-3 mb-5">

    @csrf

    <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Username:</div>
    <div class="form_registration_input col-sm-6 col-lg-6">
        <input id="name" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user" autofocus>
    </div>

    @error('user')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">E-mail:</div>
    <div class="form_registration_input col-sm-6 col-lg-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    </div>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
    <div class="form_registration_input col-sm-6 col-lg-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    </div>

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
    <div class="form_registration_input col-sm-6 col-lg-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="form_registration_title col-12 col-sm-6 col-lg-4 offset-sm-3 offset-lg-4">
        <input type="submit" name="register" value="Rejestruj!">
    </div>
</form>

<h1> A teraz zaloguj się i rozpocznij przygodę!</h1>

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
        <a href="login.php"><p>Logowanie</p></a>
    </div>
</div><br>

@endsection