@extends('layouts.app')

@section('content')
{{--@include( 'competitions.competition')--}}
@foreach ($proposition as $item)
    @if ($item->proposition_type_id==config('app.COMPETITION_PROPOSITIONS_MEDIAL_PARTNERS'))
        <div class="text">POROTA:   {!!$item->proposition_text!!}</div>
    @elseif ($item->proposition_type_id==4)
        <div class="text">POROTA:   {!!$item->proposition_text!!}</div>
    @endif

@endforeach
@endsection