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

    <h2>@lang('market.offers_yours.first_header')</h2><br>

    <br>
    
    <nav class="row">
        <div id="showOffersDiv" class="col-6 col-sm-4 col-lg-2 offset-lg-4 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a><p>Twoje Oferty</p></a></div>
        <div id="showTransactionsDiv" class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a><p>Twoje Transakcje</p></a></div>		
    </nav>	
    <nav class="row">
        <div id="addOffer" class="col-10 col-sm-6 col-lg-2 offset-1 offset-sm-3 offset-lg-5 pl-2 pr-0 pr-sm-2 pr-lg-3"><a><p>Dodaj ofertę</p></a></div>
    </nav>

    <br>

    <h2 id="offersYours">@lang('market.offers_yours.list_offers_header')</h2><br>
    <h2 id="transactionsYours" style="display:none">@lang('market.offers_yours.list_transactions_header')</h2><br>

    <div id="offersList">
        <div class="row">
            @forelse($offers as $offer)
                <div class="offerBox col-4">
                    <div class="offer">
                        <p>@lang('market.mineral'): {{$offer->mineral}}</p>
                        <p>@lang('market.amount'): {{$offer->amount}}, @lang('market.mineral_cost'): {{$offer->cost}}</p>
                        <p>@lang('market.added') {{ $offer->created_at}}</p>
                        <p>@lang('market.transaction_added'): {{$offer->transactions->count()}}, @lang('market.earned'): 
                            @if(empty($offer->transaction_total))
                                {{ trans_choice('market.cost', 0, ['cost' => 0]) }}
                            @else
                                {{ trans_choice('market.cost', $offer->transaction_total, ['cost' => $offer->transaction_total]) }}<p>
                            @endif
                        </p>
                        <button type="button" class="deletePopupRun btn btn-primary" data-id="{{$offer->id}}">@lang('market.offer_delete')</button>
                    </div>	
                </div>
            @empty
                </div>
                <div class="text-center errorBox">@lang('market.no_offers').</div>
                <div>
            @endforelse   
        </div>
    </div>

    <div id="transactionsList" style="display:none">
        <div class="row">
            @forelse($transactions as $transaction)
                <div class="offerBox col-4">
                    <div class="offer">
                        <h2 style="margin-bottom:30px;">@lang('market.transaction') #{{ $transaction->id }} (@lang('market.offer') #{{ $transaction->offer_id }})</h2>
                        <p>@lang('market.transaction_done'): {{ $transaction->updated_at }}</p>
                        <p>@lang('market.mineral'): {{ trans_choice('equipment.minerals.'.$transaction->offer->mineral.'.amountPlural', $transaction->amount, ['amount' => $transaction->amount]) }}</p>
                        <p>@lang('market.transaction_paid'): {{ trans_choice('market.cost', $transaction->total, ['cost' => $transaction->total]) }}</p>
                        <p></p>
                    </div>	
                </div>
            @empty
                </div>
                <div class="align-middle errorBox">@lang('market.no_transactions').</div>
            @endforelse     
        </div>
    </div>

    <script>

    </script>
    <div class="popup" id="offerForm">
        <div class="popupBody">
            <form method="post" action="/market/offer/add">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="typeMineral">@lang('market.minerals')</label>
                        <select id="typeMineral" class="form-control" name="mineral" required>
                            @foreach($minerals as $mineral => $cost)
                            @if(!empty($userData->$mineral))
                                <option name="{{$mineral}}" value="{{$mineral}}">{{$mineral}} (liczba: {{$userData->$mineral}}, cena: {{$cost}})</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="amountMineral">@lang('market.mineral_amount')</label>
                        <input type="number" min="1" max="{{$userData->$mineral}}" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="costMineral">@lang('market.mineral_cost')</label>
                        <input type="number" min="1" class="form-control" id="costMineral" name="cost" required>
                    </div>
                </div>
                <button style="margin-top:20px" type="submit" class="btn btn-primary">@lang('market.mineral_addoffer')</button>  
                <button style="margin-top:20px" type="button" class="btn btn-danger" id="closePopup">@lang('market.mineral_canceloffer')</button>  
            </form>
        </div>
    </div>

    <div class="popup" id="deleteOfferForm">
        <div class="popupBody">
            <p>@lang('market.confirm_delete_message')</p>
            <form method="get" id="popupForm">
                @csrf
                <div class="text-center">
                    <button style="margin-top:20px" type="submit" class="btn btn-primary">@lang('market.confirm_delete')</button>  
                    <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">@lang('market.confirm_cancel')</button>  
                </div>
            </form>
        </div>
    </div>


    @if (session('offerCreateSuccess') || session('offerDeleteSuccess'))

        <div class="popup" id="transactionSuccess" style="display:block">
            <div class="popupBodySuccess" id="transactionSuccessBody">  
                @if(Session::get('offerCreateSuccess'))
                    <h2 class="mb-3">{{ trans('market.offer_create_success', ['message' => Session::get('offerCreateSuccess.result')]) }}</h2>
                @endif
                @if(Session::get('offerDeleteSuccess'))
                    <h2 class="mb-3">{{ trans('market.offer_delete_success', ['message' => Session::get('offerDeleteSuccess.result')]) }}</h2>
                @endif
                <div class="text-center">
                    <button style="margin-top:20px" type="button" class="btn btn-primary" id="closePopup">@lang('market.back')</button>  
                </div>
            </div>
        </div>

    @endif

    <script>
        $(document).ready(function(){
            $(document).on('click', '#addOffer', function(){
                $('#offerForm').show();
            });
            $('.deletePopupRun').on('click', function(){
                $('#deleteOfferForm').show();
                $('#popupForm').attr('action', '/market/offer/'+$(this).data('id')+'/delete');
            });
            $(document).on('click', '#showOffersDiv', function(){
                $('#transactionsList').hide();
                $('#offersList').show();
                $('#transactionsYours').hide();
                $('#offersYours').show();
            });
            $(document).on('click', '#showTransactionsDiv', function(){
                $('#offersList').hide();
                $('#transactionsList').show();
                $('#offersYours').hide();
                $('#transactionsYours').show();
            });
        });
    </script>

@endsection