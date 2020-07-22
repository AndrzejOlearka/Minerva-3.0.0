
@extends('app')

@section('title', 'Minerva - Wyprawy')

@push('styles')
    <link href="{{ asset('css/expeditions.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/mission.js') }}" type="text/javascript"></script>
@endpush

@section('content')

    <header>
        <h1>@lang('missions.first_header')</h1>
    </header>

    <div class="row sign md-4">
        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="missions.php"><p>Misje</p></a>
        </div>
    </div>

    <br><br>

    @foreach(trans()->get('missions.missions') as $key => $value)
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
                    <div class="photo col-sm-6">
                        <img src="{{ asset("img/mission_$key.jpg") }}">
                    </div>
                    <div class="values col-12 col-sm-5 offset-sm-1">
                        <h3>{{ $value['title'] }}</h3>
                        <p>{{ $value['payment'] }}</p>
                        <p>{{ $value['exp'] }}</p>
                        <p>{{ $value['prize'] }}</p>
                    </div>
                </div>
                <div class="description col-12">
                    <p>{{ $value['text'] }}</p>
                    <input type="button"class = "col-4" name="mission" data-mission="{{ $key }}" value="Wykonaj misje!">
                    <br><br>
                </div>
            </div>
        </div>
        @if($key % 2 == 0 || $key == 0)
            </div>
        @endif	
    @endforeach

    <div class="popupPrize">
        <div class="popupPrizeDescription">
            @lang('missions.prizeInfo')
            <br>
            @lang('missions.prizeInfo2')
            <br>
            <span id="prizeInfo"></span>
            <br>
            <span id="prizeInfoExp"></span>
            @lang('missions.expInfo')
            
        </div>
    </div>

    <div class="popupError">
        <div class="popupErrorDescription">
            <h2 class="mb-4">@lang('missions.missing_info')</h2>
            <div id="costErrors"></div>
        </div>
    </div>
</div>

@if (session('advance'))
    @include('info/advance'); 
@endif

@endsection