
            
@extends('app')

@section('title', 'Minerva - Zmiana hasła')

@push('styles')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    <header>

        <h1>@lang('account.change-password.first_header')</h1>

    </header>

    <div class="row sign md-4">

        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <a href="/account"><p>Konto</p></a>
        </div>

    </div>

    <br>

    <header>

        <h1>@lang('account.change-nick.first_header')</h1>

    </header>

    @if (session('updatePasswordSuccess'))
        <div class="successAlert row-flex">
            Hasło zostało zmienione!
        </div>
    @else 
        <div class="row prem">
            <div class="edit row col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
                <div class="col-12">
                    <form action="/account/update/password" method="post" class="row">
                        @csrf
                        <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
                        <div class="form_registration_input col-sm-6 col-lg-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                    
                        <div class="form_registration_title col-sm-6 col-lg-4 offset-lg-1">Password:</div>
                        <div class="form_registration_input col-sm-6 col-lg-6">
                            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        @error('password')
                            <span class="error mb-4" style="width:100%" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <button type="submit" id="editPassword" class="btn btn-primary col-10 col-sm-6 offset-1 offset-sm-3 mb-4">Zmień Hasło!</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <br>

    <div class="popup" id="editPasswordConfirmPopup">
        <div class="popupBody">
            <p>Czy na pewno chcesz zmienić hasło użytkownika?</p>
                <div class="text-center">
                    <button style="margin-top:20px" type="submit" class="btn btn-primary" id="changeConfirm">Confirm</button>  
                    <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">Cancel</button>  
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#editPassword', function(event){
                event.preventDefault();
                $('#editPasswordConfirmPopup').show();
                $(document).on('click', '#changeConfirm', function(event){
                    $('form').submit();
                });
            });
        });
    </script>

@endsection