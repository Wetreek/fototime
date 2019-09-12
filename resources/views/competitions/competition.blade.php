@extends('layouts.app')

@section('content')

@include( 'competitions.competition-navbar')

<div class="container mt-2">
        <h1>{{ $competition->text_translates->where('lang_id', app()->getLocale() == "sk" ? 1 : 2)->first()->name }}</h1>
    </div>
@endsection