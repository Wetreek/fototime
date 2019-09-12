@extends('layouts.app')

@section('content')

@include( 'competitions.competition-navbar')

<div class="container mt-2">
        <h1>{{ app()->getLocale() }}</h1>
        <h1>{{ $competition->text_translates->where('lang_id', $lang)->first()->name }}</h1>
    </div>
@endsection