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
            <a href="/guilds"><p>Lista Gildii</p></a>
        </div>

    </div>

    <br><br>

    @foreach($guildData as $key => $guild)
    @if($key % 2 == 0 || $key == 0)
        <div class="row">
    @endif
    <div class="col-12 col-lg-6 mb-5">   
        <div class='guild'>
        <a href="/guilds/{{ $guild->id }}/show"><h2>{{ $guild->name }}</h2><a>
            <div class='row mb-4'>
                <div class='guildAvatar col-6 offset-3 col-sm-4 offset-sm-0 mb-2'>
                    <img src='{{ asset("/img/guild-avatars/$guild->avatar") }}'/>
                </div>
                <div class='guildData col-10 col-sm-7 offset-1 offset-sm-0'>
                    Leader: {{ $guild->guildLeader->user }}<br>
                    Exp: {{ $guild->guildExp }}<br>
                    Ilość członków: {{ $guild->members }}
                </div>
            </div>
            <div class='guildDescription'>
                {{ $guild->description }}
            </div><br>
        </div>
    </div>
    @if($key % 2 != 0 || count($guildData) % 2 != 0)
        </div>
    @endif	
@endforeach

<br>

<div class="d-flex">
    <div class="mx-auto">
        {{ $guildData->links() }}
    </div>
</div>

<br>

@endsection