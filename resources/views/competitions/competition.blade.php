
@extends('layouts.app')

@section('content')



<div class="container mt-2">
    {{--<h1>{{$competition->text_translates->where('lang_id', $lang)->first()->name }}</h1>--}}
    <h1>{{$competition->name }}</h1>
</div>


@include( 'competitions.competition-navbar')


@endsection