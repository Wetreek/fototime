@extends('layouts.app')

@section('content')
<?php
$competitionsInfo = \App\Models\Competition::where('status', 0)->get();

$lang = app()->getLocale() == "sk" ? 1 : 2; ?>
<div class="carousel-wrapper">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://via.placeholder.com/600x400" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/600x400" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/600x400" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>
@foreach ($competitionsInfo as $item)
<div class="container compName">
  <div style=" padding-top: 50px; padding-bottom: 25px" class="nav-item"><a class="nav-link" href="{{ url('/competition/' . $item->id)}}"><h1 class="text-center">{{ $item->text_translates->where('lang_id', $lang)->first()->name}}</h1></a></div>

{{--@foreach ($competitionsSidenav as $item)
<div class="container mt-2">
  <h1><a href="{{ url('/competition/' . $item->id)}}" class="waves-effect">{{ $item->text_translates->where('lang_id', $lang)->first()->name}}</a></h1>
</div>
@endforeach --}}
</div>
<div class="row text-center copmInfo">
    <span class="container borderComp col-sm-2">
    <div>
        <h2>{{ __('messages.calendar') }}</h2>
    </div>
    <div class=" borderInfo ">
            <h2>{{ __('messages.open') }}</h2>
    </div>
    </span>
    <span class="container borderComp col-sm-2">
    <div>
          <h2>{{ __('messages.themes') }}</h2>      
      </div>
      <div class=" borderInfo ">
        <p>ahoj</p>
      </div>
    </span>
    <span class="container borderComp col-sm-2">
    <div>
          <h2>{{ __('messages.organizer') }}</h2>
      </div>
      <div class=" borderInfo ">
        <p>ahoj</p>
      </div>
    </span>
      <span class="container borderComp col-sm-2">
      <div>
           <h2>{{ __('messages.recognized') }}</h2>
        </div>
        <div class=" borderInfo ">
          <p>ahoj</p>
        </div>
      </span>
        <span class="container borderComp col-sm-2">
        <div>
              <h2>{{ __('messages.awards') }}</h2>
          </div>
          <div class=" borderInfo ">
            <p>ahoj</p>
          </div>
        </span>
  </div>

@endforeach
@endsection
