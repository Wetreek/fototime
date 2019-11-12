@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <h1>{{$competition->name }}</h1>
</div>
@include( 'competitions.competition-navbar')
@foreach ($proposition as $item)
    @if ($item->proposition_type_id==config('app.COMPETITION_PROPOSITIONS_MEDIAL_PARTNERS'))
    {{--@if ($item->proposition_type_id==2)--}}
        <div class="text">Partneri:   {!! $item->proposition_text !!}</div>
    @elseif ($item->proposition_type_id==4)
        <div class="text">POROTA:   {!! $item->proposition_text !!}</div>
    @endif

@endforeach
@endsection