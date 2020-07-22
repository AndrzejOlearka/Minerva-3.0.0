@extends('app')

@section('title', 'Minerva - Targowisko')

@push('styles')
    <link href="{{ asset('css/market.css') }}" rel="stylesheet">
@endpush

@section('content')

    <header>

        <h1>@lang('market.main_first_header')</h1>

    </header>

    <div class="row sign md-4">

        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="/market"><p>Targowisko</p></a>
        </div>

    </div>

    <br><br>

    <h2>@lang('market.main_second_header')</h2><br>

    @if (session('name'))
        <div class="alert alert-success">
            Gildia: {{ session('name') }} została utworzona!
        </div>
    @endif

    <nav class="row">
        <div class="col-6 col-sm-4 col-lg-2 offset-lg-4 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/market/offers/all"><p>Lista ofert</p></a></div>	
        <div class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/market/offers/yours"><p>Twoje Oferty</p></a></div>	
    </nav>		


@endsection