
            
@extends('app')

@section('title', 'Minerva - Zarządzanie Kontem')

@push('styles')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    <header>

        <h1>@lang('account.first_header')</h1>

    </header>

    <div class="row sign md-4">

        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="/account.php"><p>Konto</p></a>
        </div>

    </div>

    <br><br>

    <h2>@lang('account.second_header')</h2><br>

    @if (session('updatePremiumSuccess'))
        <div class="successAlert">
            Premium zostało przedłużone!
        </div>
    @endif

    @if (session('updateCoinsSuccess'))
        <div class="successAlert row-flex">
            <p>Monety zostały nabyte!
        </div>
    @endif


    <div class="row prem">
        <div class="data col-4 col-lg-2 offset-lg-2"><h2>Level</h2></div>
        <div class="data col-4 col-lg-3"><h2>Exp</h2></div>
        <div class="data col-4 col-lg-3"><h2>Monety</h2></div>
        <div class="w-100"></div>
        <div class="data col-4 col-lg-2 offset-lg-2"><p>{{ $userData->level }}</p></div>
        <div class="data col-4 col-lg-3"><p>{{ $userData->exp }}</p></div>
        <div class="data col-4 col-lg-3"><p>{{ $userData->coins }}</p></div>
    </div>

    <br><h2>@lang('account.third_header')</h2>

    <div class="row prem">
        <div class="data col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
            <h2 id="premiumEdit">Posiadasz 3 dni premium, <span style='color: gold'>Przedłuż je teraz!</span></h2>
        </div>
    </div>
    <br>

    <div id="premiumBox">
    @foreach (trans()->get('account.premium') as $key => $value)
    <div class="row prem">
        <div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3">
            <p data-premium-days="{{ $premiumData[$key+1] }}">{{ $value['days'] }}</p>
        </div>
        <div class="data col-6 col-sm-4 col-lg-2">
            <p data-premium-cost="{{ $premiumData[$key+1] }}">{{ $value['payment'] }}</p>
        </div>
        <div class="data col-6 col-sm-4 col-lg-2 offset-3 offset-sm-0">
            <p>
                <input type="button" class="buttonPremium col-3" name="premium"  data-premium="{{ $premiumData[$key+1] }}" value="Zakup!">
            </p>
        </div>
    </div>
    @endforeach
    </div>
    
    <br>

    <h2>@lang('account.fourth_header')</h2>

    <div class="row prem">
        <div class="data col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
            <h2 id="coinsEdit">Posiadasz w tej chwili 0 monet, <span style='color: gold'>Wykup ich więcej!</span></h2>
        </div>
    </div>

    <br>

    <div id="coinsBox">
    @foreach (trans()->get('account.coins') as $key => $value)
        <div class="row prem">
            <div class="data col-6 col-sm-4 col-lg-2 offset-sm-0 offset-lg-3">
                <p data-coins-amount="{{ $coinsData[$key+1] }}">{{ $value['prize'] }}</p>
            </div>
            <div class="data col-6 col-sm-4 col-lg-2">
                <p data-coins-payment="{{ $coinsData[$key+1] }}">{{ $value['payment'] }}</p>
            </div>
            <div class="data col-6 col-sm-4 col-lg-2 offset-3 offset-sm-0">
            <p><input type="button" class ="buttonCoins col-3" name="coins"  data-coins="{{ $coinsData[$key+1] }}" value="Zakup!"></p>
            </div>
        </div>
    @endforeach
    </div>

    <br>

    <h2>@lang('account.fifth_header')</h2>

    <nav class="row">
        <div class="col-4 col-lg-2 offset-lg-3 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/account/edit/nick"><p>Zmień nickname</p></a></div>	
        <div class="col-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/account/edit/password"><p>Zmień hasło</p></a></div>
        <div class="col-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="account/edit/removal"><p>Usuń konto</p></a></div>
        <div class="lg-w-100"></div>
        <div class="col-4 col-lg-2 offset-lg-4 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/account/debt/loan"><p>Weź pożyczke</p></a></div>	
        <div class="col-4 col-lg-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="/account/debt/credit"><p>Kup na kredyt</p></a></div>		
    </nav>	

    <div class="popup" id="premiumConfirmPopup">
        <div class="popupBody">
            <p>Czy na pewno chcesz wybrać tą opcję premium?</p>
            <span id="premiumDays"></span>
            <span> - </span>
            <span id="premiumCost"></span>
            <div class="text-center">
                <form method="post" action="account/update/premium">
                    @csrf
                    <button style="margin-top:20px" name="premium" class="btn btn-primary">Confirm</button> 
                    <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">Cancel</button>  
                </form>
            </div>
        </div>
    </div>

    <div class="popup" id="coinsConfirmPopup">
        <div class="popupBody">
            <p>Czy na pewno chcesz wybrać ten worek monet?</p>
            <span id="coinsAmount"></span>
            <span> - </span>
            <span id="coinsCost"></span>
            <div class="text-center">
                <form method="post" action="/account/update/coins">
                    @csrf
                    <button style="margin-top:20px" name="coins" class="btn btn-primary">Confirm</button> 
                    <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">Cancel</button>  
                </form>
            </div>
        </div>
    </div>

    <br>
    <script>
        $(document).ready(function(){
            $(document).on('click', '#premiumEdit', function(){
                $('#premiumBox').show();
                $('#coinsBox').hide();
            });
            $(document).on('click', '#coinsEdit', function(){
                $('#coinsBox').show();
                $('#premiumBox').hide();
            });

            $(document).on('click', '.buttonPremium', function(){
                $('#premiumDays').text($('p[data-premium-days="'+$(this).data('premium')+'"').text());
                $('#premiumCost').text($('p[data-premium-cost="'+$(this).data('premium')+'"').text());
                $('button[name="premium"]').val($(this).data('premium'));
                $('#premiumConfirmPopup').show();
            });

            $(document).on('click', '.buttonCoins', function(){
                $('#coinsAmount').text($('p[data-coins-amount="'+$(this).data('coins')+'"').text());
                $('#coinsCost').text($('p[data-coins-payment="'+$(this).data('coins')+'"').text());
                $('button[name="coins"]').val($(this).data('coins'));
                $('#coinsConfirmPopup').show();
            });
        });
    </script>

@if (session('advance'))
    @include('info/advance'); 
@endif

@endsection