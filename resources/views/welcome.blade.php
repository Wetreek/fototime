@extends('layouts.app')

@section('content')
<?php

$lang = app()->getLocale() == "sk" ? 1 : 2; ?>
<div class="carousel-wrapper">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('img/photo_test/foto1_test_fototime.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/photo_test/foto2_test_fototime.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/photo_test/foto3_test_fototime.jpg') }}" alt="Third slide">
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
@foreach ($competitions as $competition)
<div class="container compName">
  <div style=" padding-top: 50px; padding-bottom: 25px" class="nav-item"><a class="nav-link" href="{{ url('/competition/' . $competition->id)}}"><h1 class="text-center">{{ $competition->text_translates->where('lang_id', $lang)->first()->name}}</h1></a></div>
</div>
<div class="row text-center copmInfo">
    <span class="container borderComp col-sm-2">
    <div>
        <h2>{{ __('messages.calendar') }}</h2>
    </div>
    <div class=" borderInfo ">
            <h2>{{ __('messages.open') }}</h2>
    </div>
    
    @foreach ($propositions[$competition->id] as $proposition)
            @if ($proposition->proposition_type_id==8)
                <div class="text left">{!! $proposition->proposition_text !!}</div>
            @endif
        @endforeach
    </span>

    <span class="container borderComp col-sm-2">
    <div>
          <h2>{{ __('messages.themes') }}</h2>      
      </div>
      <div class=" borderInfo ">
      </div>
      @foreach($categoryCompetition[$competition->id] as $categories)
          <div class="text left"><br>{{$categories->name}}</div>
          @endforeach
    </span>
    <span class="container borderComp col-sm-2">
    <div>
          <h2>{{ __('messages.organizer') }}</h2>
      </div>
      <div class=" borderInfo ">
      </div>
      @foreach ($propositions[$competition->id] as $proposition)
      @if ($proposition->proposition_type_id==1)
          <div class="text"><br>{!! $proposition->proposition_text !!}</div>
      @endif
  @endforeach
    </span>
      <span class="container borderComp col-sm-2">
      <div>
           <h2>{{ __('messages.recognized') }}</h2>
        </div>
        <div class=" borderInfo ">
        </div>
        @foreach ($propositions[$competition->id] as $proposition)
        @if ($proposition->proposition_type_id==2)
            <div class="text"><br>{!! $proposition->proposition_text !!}</div>
        @endif
    @endforeach
      </span>
        <span class="container borderComp col-sm-2">
        <div>
              <h2>{{ __('messages.awards') }}</h2>
          </div>
          <div class=" borderInfo ">
          </div>
          @foreach ($propositions[$competition->id] as $proposition)
          @if ($proposition->proposition_type_id==10)
              <div class="text"><br>{!! $proposition->proposition_text !!}</div>
          @endif
      @endforeach
        </span>
  </div>

@endforeach
@endsection
