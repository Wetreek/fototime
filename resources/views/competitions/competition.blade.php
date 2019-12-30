
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

@endsection