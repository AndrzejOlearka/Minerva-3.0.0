@extends('app')

@section('title', 'Minerva - Gildie')

@push('styles')
    <link href="{{ asset('css/guilds.css') }}" rel="stylesheet">
@endpush

@section('content')

    <header>

        <h1>@lang('guilds.first_header')</h1>

    </header>

    <div class="row sign md-4">

        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="/guilds"><p>Stwórz Gildię</p></a>
        </div>

    </div>

    <br><br>

    <div class="row">
        <form method="post" class="createGuild col-lg-6 offset-3" action="/guilds/create" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <label for="guildName" class="col-lg-6">Nazwa Gildii: </label>
                <input type="text" name="name"class="col-lg-5 @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name"/>
            </div><br />

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span><br><br>
            @enderror

            <div class="row"><label for="guildDescription" class="col-lg-6">Opis gildii: </label>
                <input type="text" name="description" class="col-lg-5 @error('name') is-invalid @enderror" value="{{ old('description') }}" required autocomplete="description"/>
            </div><br />

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span><br><br>
            @enderror

            <div class="row"><label for="avatar" class="col-lg-6">Wybierz avatar gildii: </label>
                <input type="file" name="avatar"class="col-lg-5"/>
            </div><br /> 

            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span><br><br>
            @enderror

            <input type="submit" name ="submit" class="col-4" value="Stwórz gildię!" />
        </form><br />
    </div>

    <br><br>

    <h2>@lang('guilds.third_header')</h2><br>

@endsection


