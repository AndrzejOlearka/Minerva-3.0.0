@extends('admin/admin')

@section('title', 'Minerva - Admin Panel')

@section('content')

<header>
    <br><h1>Ustawienia akcji</h1>
</header>

<nav class="row adminNav">
    <div data-nav="expedition" class="col-6 col-sm-4 col-lg-2 offset-lg-3 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p>Ekspedycje</p></div>			
    <div data-nav="trip" class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p>Wyprawy</p></div>
    <div data-nav="mine" class="col-6 col-sm-4 col-lg-2 pl-2 pr-0 pr-sm-2 pr-lg-3"><p>Kopalnie</p></div>								
    <div class="lg-w-100"></div>
    <div data-nav="mission" class="col-6 col-sm-4 col-lg-2 offset-lg-4 pr-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p>Misje</p></div>			
    <div data-nav="other" class="col-6 col-sm-4 col-lg-2 offset-md-2 offset-lg-0 pl-2 pr-0 pr-sm-2 pr-lg-3"><p>Inne</p></div>
</nav>	

    @php($types = ['expedition', 'trip', 'mine', 'mission', 'other'])
@foreach($types as $type)
    <form class="typeDiv" id="{{ $type }}" action="/adminSettingSave" method="post">
        @csrf
        @foreach($settings[$type] as $key => $setting)
        @if($key % 2 == 0 || $key == 0)
            <div class="row">
        @endif
            <div class="col-1 col-lg-6 mb-4" >
            <h3>{{ $setting->setting }}</h3>
            <textarea name="{{ $setting->setting }}" class="form-control" style="height:150px; background-color:#59A8A4; border: 7px solid #336699;">{{ $setting->value }}</textarea>
            </div>
        @if($key % 2 != 0)
            </div>
        @endif	
        @endforeach
        <button type="submit" class="btn btn-lg btn-primary">Zapisz</button>
    </form>
@endforeach

<header>
    <br><h1>Miłej pracy!</h1>
</header>

@endsection