



            
@extends('app')

@section('title', 'Minerva - Autorzy')

@push('styles')
    <link href="{{ asset('css/stats.css') }}" rel="stylesheet">
@endpush

@section('content')

    <br><h1>@lang('authors.first_header')</h1>

    <div class="row sign md-4">

            <div class="col-10 col-sm-6 col-lg-4 offset-1 offset-sm-3 offset-lg-4 pl-2 pr-0 pr-sm-2 pr-lg-3">
                <a href="/authors"><p>Autorzy</p></a>
            </div><br>

    </div><br>

    <div class="row">

        <div class="authors col-12 col-sm-8 offset-sm-2">
            <h2>@lang('authors.author')</h2>
            <p>@lang('authors.text')</p>
        </div>

    </div>

@endsection