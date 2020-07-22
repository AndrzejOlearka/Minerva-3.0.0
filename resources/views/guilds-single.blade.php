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
            <a href="/guilds"><p>Twoja Gildia</p></a>
        </div>

    </div>

    <br><br>

    <h2>{{$guildData['name']}}</h2><br>

    <p>{{$guildData['description']}}</p>

    <br><br>

    <h2>@lang('guilds.third_header')</h2><br>

@endsection