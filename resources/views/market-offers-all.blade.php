@extends('app')

@section('title', 'Minerva - Targowisko')

@push('styles')
    <link href="{{ asset('css/market.css') }}" rel="stylesheet">
@endpush

@section('content')

    <header>

        <h1>@lang('market.first_header')</h1>

    </header>

    <div class="row sign md-4">

        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="/market"><p>Targowisko</p></a>
        </div>

    </div>

    <br><br>

    <h2>@lang('market.offers_all_first_header')</h2><br>

    <br>

    <h4>Obecnie posiadasz <strong id="coinsInfo">{{ $userData->coins }}</strong> monet.</h4>

    <br>

    <div class="row">
        @forelse($offers as $offer)
            <div class="offerBox col-3">
                <div class="offerAll">
                    <p>Minerał: {{$offer->mineral}}</p>
                    <p>Liczba: {{$offer->amount}}, Cena: {{$offer->cost}}</p>
                    <p>Dodana {{ $offer->created_at}}</p>
                    <button type="button" class="openOrderPopup btn btn-primary" data-offerid="{{$offer->id}}">Kup minerały</button>
                </div>	
            </div>
        @empty
        </div>
            <div class="text-center errorBox">@lang('market.no_offers').</div>
        @endforelse 
    </div>	

    <br><br>

    <div class="d-flex">
        <div class="mx-auto">
            {{ $offers->links() }}
        </div>
    </div>

    <div class="popup" id="orderMineralsForm">
        <div class="popupBody" id="orderMineralsFormBody">
            <h3 id="offerOrderHeader"></h3>
            <br>
            <form method="post" id="popupForm">
            <div class="slider"></div>
            <br>
            <input type="number" name="amount" min="1" id="scale">
            <input type="hidden" name="offerid" id="offerInput">
            @csrf
            <div class="alert error" style="margin-top:20px; display:none;" id="tooMuchError">@lang('market.no_money_info')</div>
            <div class="text-center">
                <button style="margin-top:20px" type="submit" class="btn btn-primary" id="confirmTransaction">@lang('market.confirm_delete')</button>  
                <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">@lang('market.confirm_cancel')</button>  
            </div>
            </form>
        </div>
    </div>

    @if (session('transaction'))

        <div class="popup" id="transactionSuccess" style="display:block">
            <div class="popupBody" id="transactionSuccessBody">
                
                @if(Session::get('transaction.error'))
                    <div class="alert error">{{ Session::get('transaction.error') }}</div>
                @else
                    <h3 class="mb-3">@lang('market.transaction') #{{ Session::get('transaction.id') }}</h3>
                    <div class="text-center mb-3">
                        @lang('market.added_transaction_message') {{ Session::get('transaction.amount') }} {{ Session::get('transaction.mineral') }}
                    </div>
                @endif
                <div class="text-center">
                    <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">@lang('market.back')</button>  
                </div>
            </div>
        </div>

    @endif

    <script>
        $(document).ready(function(){
            $('.openOrderPopup').on('click', function(){
                var offerid = $(this).data('offerid')
                $(".slider").data('offerid', offerid);
                $.ajax({
                    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    url: "/getOfferInfo",
                    method: "post",
                    data: {
                        'offerid' : offerid,
                    }
                })
                .done(function(offer) {
                    var offer = offer.offer;
                    $("#scale").attr({
                        "max" : offer.amount,   
                        "min" : 1
                    });
                    $(function(){
                        var sliders = $('.slider');
                        for (i = 0; i < sliders.length; i++) {
                            $(".slider").eq(i).slider({
                                orientation: "horizontal",
                                range: "min",
                                max: offer.amount,
                                min: 1,
                                value: 1,
                                slide: function(event, ui, name) {
                                    changeSlider(ui, offer);
                                },
                            });
                            function changeSlider(ui, offer)
                            {
                                $("#scale").val(ui.value);
                                    if($('#coinsInfo').text() < offer.cost * ui.value){
                                        $('#tooMuchError').show();
                                        $('#confirmTransaction').attr('disabled', true);
                                    } else {
                                        $('#tooMuchError').hide();
                                        $('#confirmTransaction').attr('disabled', false);
                                    }
                            }
                            $(".slider").slider( "value", 1)
                            $('#scale').on('keyup', function(){
                                $(".slider").slider( "value", $('#scale').val() )
                                if($('#coinsInfo').text() < offer.cost * $('#scale').val()){
                                        $('#tooMuchError').show();
                                    } else {
                                        $('#tooMuchError').hide();
                                    }
                            });
                        }
                    });
                    $('#offerOrderHeader').text("Oferta #"+offer.id+" - "+offer.mineral)
                    $('#orderMineralsForm').show();
                    $('#popupForm').attr('action', '/market/offer/'+offer.id+'/transaction');
                    $('#offerInput').val(offer.id)
                })
                .fail(function() {
                    alert( "error" );
                })
   
            });
            
        });
    </script>

@endsection