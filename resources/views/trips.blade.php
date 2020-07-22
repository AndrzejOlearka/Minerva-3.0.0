@extends('app')

@section('title', 'Minerva - Wyprawy')

@push('styles')
    <link href="{{ asset('css/trips.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/actions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/trips.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/trip_start.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/trip_check.js') }}" type="text/javascript"></script>
@endpush

@section('content')

    <header>		
        <h1>@lang('trips.first_header')</h1>
    </header>	

    <div class="row sign md-4">
        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="/trips">
                <p>Wyprawy</p>
            </a>
        </div>
    </div>
        
    <br>

    <div>
        <h2>@lang('trips.second_header')</h2>
    </div>

    <br>	

    <div id="actionContent">

        @if($actionData['actionDesc'])
            <div><h3 id="actionDescription">{{ $actionData['actionDesc'] }}</h3></div> 
        @else 
            <div><h3 id="actionDescription">@lang('trips.actionInfo')</h3></div> 
        @endif			
                
        <div><h3 id="time">@lang('trips.notrips_info')</h3></div> 

        <div id="map" class="no-gutters">
            @foreach(trans()->get('trips.trips') as $key => $value)
                <div class="mapTrips" data="{{ $value['data'] }}" data-trip="{{ $key }}"><img src="{{ asset("img/trip_$key.jpg") }}"></div>
            @endforeach
            <div style="clear: both;"></div>
        </div>		
            
        <br>

        @foreach(trans()->get('trips.trips') as $key => $value)
            <article>					
                <div class="tripDescription col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3" id="tripDescription{{ $key }}">
                <h2>{{ $value['title'] }}</h2>
                <p>{{ $value['text'] }}</p>
                <input type="button" name="trip" class="button col-6 offset-3" data-trip="{{ $key }}" value="Rozpocznij wyprawę!">
                </div>
            <article>
        @endforeach

        <br>

    </div>

    <div class="popupPrize">
        <div class="popupPrizeDescription">
            @lang('trips.prizeInfo')
            <br>
            <span id="prizeInfo"></span>
            <br>
            <span id="expInfo"></span>
            @lang('trips.expInfo')
            
        </div>
    </div>

    @if (session('advance'))
    @include('info/advance'); 
@endif

@endsection