            
@extends('app')

@section('title', 'Minerva - Ekwipunek')

@push('styles')
    <link href="{{ asset('css/equipment.css') }}" rel="stylesheet">
@endpush

@section('content')

<header>
    <h1> Zobacz jakie minerały i kosztowności udało ci się zdobyć!</h1>
</header>

<div class="row sign md-4">
    <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3"><a href="equipment.php"><p>Ekwipunek</p></a></div>
</div>

<br /><br />

<h1>Witaj User!</h1>

<br />

<h2>Prześledź stan swojej kolekcji, a jeśli chcesz to sprzedaj swoje zasoby!</h2>

<br />

<div class="row sign md-4">
    <div id="basicShow" class="col-10 col-sm-5 col-lg-3 offset-1 offset-lg-3 pl-2 pr-0 pr-sm-2 pr-lg-3 float-left">
        <a ><p>Podstawowe Minerały</p></a>
    </div>
    <div id="advancedShow" class="col-10 col-sm-5 col-lg-3 offset-1 offset-sm-0 pl-2 pr-0 pr-sm-2 pr-lg-3 float-left">
        <a ><p>Zaawansowane Minerały</p></a>
    </div>
</div>

<br /><br />

<div id="basicMinerals">

    <br /><h1>Podstawowe minerały</h1><br />

    <div class="row no-gutters md-4">
        @foreach($minerals['basic'] as $key => $value)
            <div class="basicMineral col-4 col-md-3 ">
                @if(!is_null($value))
                    <div class="mineral" data-mineral="{{$key}}" style="display:block">
                        <h3>@lang('equipment.minerals.'.$key.'.plural')</h3>
                        <p data-amount="{{$key}}">{{ $value }}</p>
                        <p>@choice('equipment.cost', $settings['basicMineralCost'][$key], ['cost' => $settings['basicMineralCost'][$key]])</p>
                        <div data-mineral="{{$key}}" class="slider"></div>
                        <div class="sellingForm"> 
                            <input type="text" data-scale="{{$key}}" name="basicMineral">
                            <input type="submit" class="mineralSale" data-mineral="{{$key}}" value="sprzedaj!">
                        </div>
                    </div>
                @else
                    <div class="hiddenMineral">Nieodkryte!</div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<div id="advancedMinerals">

    <br /><h1>Zaawansowane minerały</h1><br />

    <div class="row no-gutters md-4">
        @foreach($minerals['advanced'] as $key => $value)
            <div class="advancedMineral col-4">
                @if(!is_null($value))
                    <div class="mineral" data-mineral="{{$key}}" style="display:block">
                        <h3>@lang('equipment.minerals.'.$key.'.plural')</h3>
                        <p data-amount="{{$key}}">{{ $value }}</p>
                        <p>@choice('equipment.cost', $settings['advancedMineralCost'][$key], ['cost' => $settings['advancedMineralCost'][$key]])</p>
                        <div data-mineral="{{$key}}" class="slider"></div>
                        <div class="sellingForm"> 
                            <input type="text" data-scale="{{$key}}" name="advancedMineral">
                            <input type="submit" class="mineralSale" data-mineral="{{$key}}" value="sprzedaj!">
                        </div>
                    </div>
                @else
                    <div class="hiddenMineral">Nieodkryte!</div>
                @endif
            </div>
        @endforeach
    </div>
</div>
       
<div class="popup">
    <div class="popupBody">
        @lang('equipment.sellInfoMineral')<span id="popupMineralInfo"></span><br>
        @lang('equipment.sellInfoCoins')<span id="popupCoinsInfo"></span><br>
    </div>
</div>


<!-- popups with minerals description
// okienka wyskakujące z opisem minerałów -->

<div class="popupEquipment" data-popup="popup-bursztyny">
    <div class="popupDescription">
        <h1>~~ Bursztyny ~~</h1>
        <div class="row">
            <img src="../public/img/bursztyny.png" alt="bursztyny" title="bursztyny" class="col-4">
            <div class="col-8"><p>Bursztyny jakie znamy to kamienie powstałe w wyniki zastygnięcia żywicy drzew iglastych z czasów prehistorycznych (najstarsze z dewonu). Jak wiadomo ceniony jest on nie tylko w jubilerstwie ale też w medycynie ludowej. Dawniej był często używany jako środek płatniczy. Istnieją bursztyny, które ceną przewyższają kilkukaratowe diamenty!</p>
            </div>
        </div>
        <br />
        <a data-popup-close="popup-bursztyny" ><h1>
            &gt;&gt; powrót &lt;&lt; </h1>
        </a>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', '#basicShow', function(){
            $('#advancedMinerals').hide();
            $('#basicMinerals').show();
        });
        $(document).on('click', '#advancedShow', function(){
            $('#basicMinerals').hide();
            $('#advancedMinerals').show();
        });
        $(function(){
            var sliders = $('.slider');
            for (i = 0; i < sliders.length; i++) {
                var name = $(".slider").eq(i).data('mineral');
                $(".slider").eq(i).slider({
                    orientation: "horizontal",
                    range: "min",
                    max: $("p[data-amount='"+name+"']").text(),
                    value: 0,
                    slide: function(event, ui, name) {
                        var name = $(ui)[0].handle.parentElement.parentElement.getAttribute('data-mineral');
                        $("input[data-scale='"+name+"']").val(ui.value);
                    },
                    change: function(event, ui, name) {
                        var name = $(ui)[0].handle.parentElement.parentElement.getAttribute('data-mineral');
                        $("input[data-scale='"+name+"']").val(ui.value);
                    },
                });
                $(".slider").eq(i).slider( "value", 0 )
            }
        });
        $(document).on('click', '.mineralSale', function(){
            $.ajax({
                "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url:"/sellMineral",
                method:"post",
                data:{
                    'mineral' : $(this).data('mineral'),
                    'amount' : $("input[data-scale='"+ $(this).data('mineral')+"']").val(),
                    'type' : $("input[data-scale='"+ $(this).data('mineral')+"']").attr('name'),
                }
            })
            .done(function(data) {
                $("p[data-amount='"+data.mineral+"']").text(data.newAmount);
                $("#popupMineralInfo").text(data.mineralLang);
                $("#popupCoinsInfo").text(data.coinsLang);
                $(".popup").show();
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

