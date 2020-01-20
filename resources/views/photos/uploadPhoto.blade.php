@extends('layouts.app')

@section('content')

<div class="container mt-2">
    <h1 style="padding-bottom: 50px">{{$competition->name }} - {{ __('messages.uploadPhoto') }}</h1>
</div>
@foreach($categoryCompetition as $item)
        <hr class="my-2">
        <h2 class="uploadPhotoCategory">{{$item->name}}</h2>
        <div>
            <a href="{{ url('/detailPhoto/' . $item->id)}}"><button class="btn-addPhoto">+</button></a>
        </div>

        <hr class="my-2">
@endforeach
@endsection