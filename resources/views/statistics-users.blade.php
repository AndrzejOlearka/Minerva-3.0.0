


            
@extends('app')

@section('title', 'Minerva - Statystyki Użytkownika')

@push('styles')
    <link href="{{ asset('css/stats.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="row sign md-4">
                
        <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
            <p>Statystyki</p>
        </div>
        
    </div>
        
    <header>
        
    <br><h1>@lang('stats.first_header')</h1>
        
    </header>	

    <h2>@lang('stats.second_header')</h2>

    <div class="row">
        <div class="search col-8 col-sm-4 col-lg-2 offset-2 offset-sm-4 offset-lg-5">
            <input type="text" id="search" class="col-10 offset-1 mt-2 " name="nick">
            <button type="button" id="searchUser" class="btn btn-primary col-4 mt-3" type="button">Szukaj!</button>
        </div>	
    </div>

    <br>

    <div class="popup" id="searchAccountsInfo">
        <div class="popupBody" id="searchAccountsInfoBody">
            <h3>Wyniki Wyszukiwania:</h3>
            <div class="alert error" style="margin-top:20px; display:none;" id="notFound">Nie znaleziono takiego użytkownika, ani żadnego podobnego!</div>
            <div class="alert error" style="margin-top:20px; display:none;" id="similarFound">
                <p>Nie znaleziono takiego użytkownika, ale przypisaliśmy podobnych:</p>
                <p id="similarUsers"></p>
            </div>
            <div style="margin-top:20px; display:none;" id="userFound" class="successAlert">
            </div>
            <br>
            <div class="text-center">
                <button style="margin-top:20px" type="submit" class="btn btn-info" id="closePopup">OK</button> 
            </div>
        </div>
    </div>

    <script>
         $(document).ready(function(){
            $(document).on('click', '#searchUser', function(){
                $.ajax({
                    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    url: "/search/user",
                    method: "post",
                    data: {
                        'search' : $('#search').val(),
                    }
                })
                .done(function(response) {
                    searchResultBuilder(response);
                    $('#searchAccountsInfo').show();
                })
                .fail(function() {
                    alert( "error" );
                })
            });
            function searchResultBuilder(response)
            {
                $('#notFound').hide();
                $('#similarFound').hide();
                $('#userFound').hide();
                if(response.status == {{UserResearch::NONE_USERS_FOUND}})
                {
                    $('#notFound').show();
                } else if (response.status == {{UserResearch::SIMILAR_USERS_FOUND}})
                {
                    let usersAmount = response.result.length;
                    let iterator = 1;
                    var users = '';
                    for(iterator; iterator <= usersAmount; iterator++)
                    {
                        users = users + '<a href="statistics/users/show'+response.result[iterator-1].id+'">'+response.result[iterator-1].user+'</a>';
                        if(iterator !== usersAmount){
                            users = users + ', ';
                        }
                    }
                    $('#similarUsers').html(users);
                    $('#similarFound').show();
                } else if(response.status == {{UserResearch::SEARCHED_USER_FOUND}})
                {
                    user = '<h4 class="mb-4">Gratulacje! odnaleziono użytkownika o podanych danych:</h4>'
                    user = user + '<h2 class="mb-3"><a href="statistics/users'+response.result.id+'/show">'+response.result.user+'</a></h2>';
                    user = user + '<p>Poziom: '+response.result.level+'</p>';
                    user = user + '<p>Doświadczenie: '+response.result.exp+'</p>';
                    $('#userFound').html(user);
                    $('#userFound').show();
                }
            }
        });
    </script>

@endsection