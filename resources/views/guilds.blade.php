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
            <a href="/guilds"><p>Gildie</p></a>
        </div>

    </div>

    <br><br>

    <h2>@lang('guilds.second_header')</h2><br>

    @if (session('name'))

        <div class="popup" id="transactionSuccess" style="display:block">
            <div class="popupBody" id="transactionSuccessBody">
                <h3 class="mb-3">{{ trans('guilds.session_created', ['name' => Session::get('name')])}}</h3>
                <div class="text-center">
                    <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">@lang('market.back')</button>  
                </div>
            </div>
        </div>

    @endif


    @if (session('name'))
        <div class="alert alert-success">
            
        </div>
    @endif

    <nav class="row">
        <div class="col-6 col-sm-4 col-lg-2 offset-lg-4 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/guilds/list"><p>Lista Gildii</p></a></div>	
        @if(empty($userGuildData))
            <div class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/guilds/create"><p>Stwórz gildię</p></a></div>	
        @else
            <div class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/guilds/{{ $userGuildData->guildid }}/show"><p>Twoja Gildia</p></a></div>
        @endif		
    </nav>		

    <br><br>

    <h2>@lang('guilds.third_header')</h2><br>

@endsection