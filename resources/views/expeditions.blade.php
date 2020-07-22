            
@extends('app')

@section('title', 'Minerva - Ekwipunek')

@push('styles')
    <link href="{{ asset('css/expeditions.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/actions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/expedition_start.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/expedition_check.js') }}" type="text/javascript"></script>
@endpush

@section('content')

<header>
    <h1> Zobacz jakie minerały i kosztowności udało ci się zdobyć!</h1>		
</header>	

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="expeditions.php"><p>Ekspedycje</p></a></div>
</div>

<br>

<h2>Wyrusz na ekspedycje, by zdobyć cenne nagrody i doświadczenie!</h2>	

<br>

<div id="actionContent">

    @if($actionData['actionDesc'])
        <div><h3 id="actionDescription">{{ $actionData['actionDesc'] }}</h3></div> 
    @else 
        <div><h3 id="actionDescription">@lang('expeditions.actionInfo')</h3></div> 
    @endif

    <div><h3 id="time">Tym bardziej, że jeszcze nie odbyłeś żadnej z nich!</h3></div> 

    @foreach(trans()->get('expeditions.expeditions') as $key => $value)
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
                        <img src="{{ asset("img/expedition_$key.jpg") }}">
                    </div>
                    <div class="values col-12 col-sm-5 offset-sm-1">
                    <h3>{{ $value['title'] }}</h3>
                    <p>{{ $value['payment'] }}</p>
                    <p>{{ $value['prize'] }}</p>
                    <p>{{ $value['exp'] }}</p>
                    <p>{{ $value['time'] }}</p>
                    </div>
                </div>
                <div class="description col-12">
                    <p>{{ $value['text'] }}</p>
                    @if($actionData['actionAvailableByCost'][$key] && $actionData['actionAvailableByLevel'][$key])
                        <input type="button" class = "col-4 buttonStart" name="expedition" data-expedition="{{ $key }}" value="Rozpocznij zadanie!"></p>
                    @endif
                    <br />
                </div>
            </div>
        </div>
        @if($key % 2 == 0 || $key == 0)
            </div>
        @endif	
    @endforeach
</div>

<div class="popupPrize">
    <div class="popupPrizeDescription">
        @lang('expeditions.prizeInfo')
        <br>
        <span id="prizeInfo"></span>
        <br>
        <span id="expInfo"></span>
        @lang('expeditions.expInfo')
        
    </div>
</div>

@if (session('advance'))
    @include('info/advance'); 
@endif

@endsection