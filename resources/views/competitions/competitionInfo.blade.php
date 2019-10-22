@extends('layouts.app')

@section('content')
@include( 'competitions.competition')
@foreach ($category as $item)
                {{$item->text_translates->where('lang_id', $lang)->first()->name}}
@endforeach
@endsection