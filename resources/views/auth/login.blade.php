
@extends('../app')

@section('title', 'Minerva - Logowanie')

@section('content')

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
        <a href="login.php"><p>Logowanie</p></a>
    </div>
</div>

<header>
    <br><h1> Zaloguj się i rozpocznij przygodę z Minervą!</h1>
</header>

<form action="{{ route('login') }}" method="post" class="row form_registration col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3 mb-5">

    @csrf

    <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Login:</div>
    <div class="form_registration_input col-sm-6 col-lg-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    </div>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
    <div class="form_registration_input col-sm-6 col-lg-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    </div>
    <div class="form_registration_title col-12 col-sm-6 col-lg-4 offset-sm-3 offset-lg-4"><input type="submit" value="Zaloguj!" name="log"/></div>

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</form>

<h1>Nie jesteś zarejestrowany? Zrób to natychmiast!</h1>

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
        <a href="registration.php"><p>Rejestracja</p></a>
    </div>
</div>

@endsection

{{--

@if (Route::has('password.request')) 
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
@endif

--}}
                           