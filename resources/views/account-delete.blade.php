
            
@extends('app')

@section('title', 'Minerva - Zmiana nicku')

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

        <h1>@lang('account.change-nick.first_header')</h1>

    </header>

    <div class="row-flex prem">
        <div class="edit row-flex col-12 col-sm-8 col-lg-4 offset-sm-2 offset-lg-4">
            <button class="btn btn-primary mt-3 mb-3" id="deleteProcessStart">Rozpocznij procedurę</button>
            <div id="deleteAccountForm" style="display:none" class="mt-3 row-flex">
                <p>Wprowadź hasło:</p>
                <input type="password" id="confirmPassword" name="password" style="width:50%"><br>
                <button class="btn btn-primary mt-3 mb-3" id="deleteUser">Usuń konto</button>
            </div>
            <div class="error" id="confirmPasswordError" style="display:none">Hasło się nie zgadza!</div>
        </div>
    </div>

    <br>

    <div class="popup" id="deleteAccountConfirmPopup">
        <div class="popupBody">
            <p>Czy na pewno chcesz usunąć swoje konto?</p>
                <div class="text-center">
                    <form method="post" action="/account/delete">
                        @csrf
                        <button style="margin-top:20px" name="deleteUser" class="btn btn-primary" id="deleteConfirm">Confirm</button> 
                        <button style="margin-top:20px" type="button" class="btn btn-info" id="closePopup">Cancel</button>  
                    </form>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#editNick', function(){
                $('#deleteAccountConfirmPopup').show();
            });
            $(document).on('click', '#deleteProcessStart', function(){
                $('#deleteAccountForm').show();
                $(this).hide();
            });
            $(document).on('click', '#deleteUser', function(){
                $.ajax({
                    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    url:"/account/confirmPassword",
                    method:"post",
                    data:{
                        'password' : $('#confirmPassword').val(),
                    }
                })
                .done(function(data) {
                    if(data.confirmed){
                        $('#confirmPasswordError').hide();
                        $('#deleteAccountConfirmPopup').show();
                    } else {
                        $('#confirmPasswordError').show();
                    }
                })
                .fail(function() {
                    alert( "error" );
                })
            });
        });
    </script>

@endsection