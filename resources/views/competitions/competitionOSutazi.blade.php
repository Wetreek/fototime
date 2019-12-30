@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <h1>{{$competition->name }}</h1>
</div>
@include( 'competitions.competition-navbar')

@foreach ($proposition as $item)
    @if ($item->proposition_type_id==4)) {{--config('app.COMPETITION_PROPOSITIONS_COMP_AIM_THEMES'))--}}
        <div class="text">Popis súťaže:  {!! $item->proposition_text !!}</div>
    @endif
@endforeach
@foreach ($proposition as $item)
    @if ($item->proposition_type_id==config('app.COMPETITION_PROPOSITIONS_MEDIAL_PARTNERS'))
    {{--@if ($item->proposition_type_id==2)--}}
        <div class="text">Partneri:   {!! $item->proposition_text !!}</div>
    @endif
@endforeach
@foreach ($proposition as $item)

    @if ($item->proposition_type_id==8)
        <div class="text">{!! $item->proposition_text !!}</div>
    @endif
@endforeach
@foreach ($proposition as $item)
    @if ($item->proposition_type_id==11)
        <div class="text">Poplatok:  {!! $item->proposition_text !!}</div>
    @endif

@endforeach
{{--@foreach ($category as $item)
                <div class="text">{{$item->text_translates->where('lang_id', $lang)->first()->name}}</div>
@endforeach--}}
@endsection
