
@extends('layouts.app')

@section('content')



    <div class="container mt-2">
        {{--<h1>{{$competition->text_translates->where('lang_id', $lang)->first()->name }}</h1>--}}
        <h1 style="padding-bottom: 50px">{{$competition->name }}</h1>
    </div>
    @foreach ($proposition as $item)
    @if ($item->proposition_type_id==4)) {{--config('app.COMPETITION_PROPOSITIONS_COMP_AIM_THEMES'))--}}
        <div class="text">{!! $item->proposition_text !!}</div>
    @endif
    @endforeach
    <div class="row text-center copmInfo">
        <span class="container borderComp col-sm-2">
        <div>
            <h2>{{ __('messages.calendar') }}</h2>
        </div>
        <div class=" borderInfo ">
                <h2>{{ __('messages.open') }}</h2>
        </div>
        @foreach ($proposition as $item)
            @if ($item->proposition_type_id==8)
                <div class="text">{!! $item->proposition_text !!}</div>
            @endif
        @endforeach
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
      @if (auth()->user())
      <div class="row text-center">
      <span class="container btn-span-padding center col-sm-12">
              
                <a href="{{ url('/loginCompetition/' . $competition->competition_id)}}"><button type="button" class="btn btn-primary btn-join">
                    {{ __('menu.competition_join') }}
                </button></a>
                <a href="{{ url('detailPhoto') }}"><button type="button" class="btn btn-primary btn-join">Detail fotografie</button></a>
        </span> 
         </div>
      @else 
      @guest 
    <div class="row text-center">
      <span class="container btn-span-padding  col-sm-4">
        <div class="btn-span-login">
          <a href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-join" >{{ __('messages.login') }}</button></a>
        </div>
      </span>
      @if (Route::has('register'))
      <span class="container btn-span-padding col-sm-4">
          <div>
              <a href="{{ route('register') }}"><button type="button"class="btn btn-primary btn-join" >{{ __('messages.register') }}</button></a>
          </div>
      </span>
      <div>
      @endif
        @endguest
      @endif

@endsection