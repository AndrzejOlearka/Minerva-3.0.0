
            
@extends('app')

@section('title', 'Minerva - Zarządzanie Pożyczkami i Kredytami')

@push('styles')
    <link href="{{ asset('css/debt.css') }}" rel="stylesheet">
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

    <div class="row">
        <div class="md-3 col-6 col-lg-4 offset-lg-2">
            <div class="debt">
                <h2>Pożyczka</h2>
                <p>Zdolność kredytowa: <span>{{ $creditWorthiness['loan']->getRatio() }}</span>%</p>
                <p>Maksymalna ilość: <br><span>{{ $creditWorthiness['loan']->getLoanLimit() }}</span> monet</p>
                <button class="debtAttempt btn btn-primary" type="button" data-type="loan" data-ratio="{{ $creditWorthiness['loan']->getRatio() }}">Aplikuj</button>
            </div>
        </div>
        <div class="md-3 col-6 col-lg-4 offset-lg-0">
            <div class="debt">
                <h2>Kredyt</h2>
                <p>Zdolność kredytowa: <span>{{ $creditWorthiness['credit']->getRatio() }}</span>%</p>
                <p>Maksymalna ilość: <br>
                    <span>{{ $creditWorthiness['credit']->getCreditLimit()['silver'] }}</span> srebra lub
                    <span>{{ $creditWorthiness['credit']->getCreditLimit()['gold'] }}</span> złota
                </p>
                <button class="debtAttempt btn btn-primary" type="button" data-type="credit" data-ratio="{{ $creditWorthiness['credit']->getRatio() }}">Aplikuj</button>
            </div>
        </div>
    </div>
    
    <br>

    <div class="popup" id="attemptSuccess" style="display:none">
        <div class="popupBodySuccess">
            <h2 class="mb-3">Gratulacje!</h2>
            <p>Bank udzielił ci zgody na kredyt.</p>
            <div class="text-center">
                <button style="margin-top:20px" type="button" class="btn btn-primary" id="closePopup">OK</button>  
            </div>
        </div>
    </div>

    <div class="popup" id="attemptFailure" style="display:none">
        <div class="popupBodyError">
            <h2 class="mb-3">Przykro nam...</h2>
            <p>Bank nie udzielił ci zgody na kredyt.</p>
            <div class="text-center">
                <button style="margin-top:20px" type="button" class="btn btn-primary" id="closePopup">OK</button>  
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.debtAttempt').on('click', function(){
                $.ajax({
                    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    url: "/debts/attempt",
                    method: "post",
                    data: {
                        'ratio' : $(this).data('ratio'),
                        'type' : $(this).data('type')
                    }
                })
                .done(function(decision) {
                    if(decision.result == 1){
                        $('#attemptSuccess').show();
                    } else {
                        $('#attemptFailure').show();
                    }
                })
                .fail(function() {
                    alert( "error" );
                })
            });
        });
    </script>

@if (session('advance'))
    @include('info/advance'); 
@endif

@endsection