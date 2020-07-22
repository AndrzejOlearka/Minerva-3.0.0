
            
@extends('app')

@section('title', 'Minerva - Weź pożyczkę')

@push('styles')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    <header>

        <h1>@lang('account.change-nick.first_header')</h1>

    </header>

    <div class="row sign md-4">

        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="/account"><p>Konto</p></a>
        </div>

    </div>

    <br>

    <header>

        <h1>Pożyczki</h1>

    </header>


    @if (session('updateUserSuccess'))
        <div class="successAlert row-flex">
            Nick został zmieniony!
        </div>
    @else 
        <div class="row prem">
            <div class="edit row col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
                <div class="col-12">
                    <form action="/account/loan/create" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="amountMineral">Amount</label>
                            <input type="number" min="1000" max="{{  $bankData->getLoanLimit() }}" class="form-control" id="amount" name="amount" required>
                        </div>
                        <button type="submit" id="editNick" name="editNick" class="btn btn-primary col-10 col-sm-6 offset-1 offset-sm-3 mb-4">Zmień Nick!</button>
                        @error('user')
                            <span class="error mb-3" style="width:100%" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    @endif
    

    <br>

    <div class="popup" id="editNickConfirmPopup">
        <div class="popupBody">
            <p>Czy na pewno chcesz zmienić nick użytkownika?</p>
                <div class="text-center">
                    <button style="margin-top:20px" type="submit" class="btn btn-primary" id="changeConfirm">Confirm</button>  
                    <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">Cancel</button>  
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#editNick', function(event){
                event.preventDefault();
                $('#editNickConfirmPopup').show();
                $(document).on('click', '#changeConfirm', function(event){
                    $('form').submit();
                });
            });
            if($('input[name="user"]').val().length == 0){
                $('#editNick').attr('disabled', 'disabled');
            }
            $('input[name="user"]').on('keyup', function() {
                let empty = false;
                empty = $(this).val().length < 5 || $(this).val().length > 20;
                if (empty)
                    $('#editNick').attr('disabled', 'disabled');
                else
                    $('#editNick').attr('disabled', false);
            });
        });
    </script>

@endsection