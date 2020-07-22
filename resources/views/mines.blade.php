            
@extends('app')

@section('title', 'Minerva - Kopalnie')

@push('styles')
    <link href="{{ asset('css/expeditions.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/actions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/mine.js') }}" type="text/javascript"></script>
@endpush

@section('content')

<header>
    <h1>@lang('mines.first_header')</h1>
</header>

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
        <a href="mains"><p>Kopalnie</p></a>
    </div>
</div>

<br><br>

<header>
    <h2>@lang('mines.second_header')</h2>
</header>

<br><br>

@foreach(trans()->get('mines.mines') as $key => $value)
    @if($key % 2 != 0)
        <div class="row">
    @endif
    <div class="col-12 col-lg-6 mb-5">
        @if($actionData['actionAvailableByLevel'][$key])
            <div class="expeditions">
        @else
            <div class="expeditions unavailable">
        @endif
            <div class="row no-gutters">
                <div class="photo col-sm-6 ">
                    <img src="{{ asset("img/mine_$key.jpg") }}">
                </div>
                <div class="values col-12 col-sm-5 offset-sm-1">
                    <h3>{{ $value['title'] }}</h3>
                    <p>{{ $value['payment'] }}</p>
                    <p>{{ $value['prize'] }}</p>
                </div>
            </div>
            <div class="description col-12">
                <p>{{ $value['text'] }}</p>
                <input type="button" class="col-4 buttonStart" name="mine" data-mine="{{ $key }}" value="Zakup kopalnie!"></p>
                </form><br>
            </div>
        </div>
    </div>
    @if($key % 2 == 0 || $key == 0)
        </div>
    @endif	
@endforeach

<div class="popupPrize">
    <div class="popupPrizeDescription">
        <span id="prizeInfo"></span>
        <br>
        @lang('mines.expInfo')
        <span id="expInfo"></span>
        @lang('mines.expInfo2')
    </div>
</div>

@if (session('advance'))
    @include('info/advance')
@endif

@endsection