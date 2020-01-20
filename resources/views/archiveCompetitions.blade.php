@extends('layouts.app')

@section('content')
{{--<div class="container-fluid">
    <div class="data">
        <table class="table table-dark">
            <thead>
                <th scope="row">ID</th>
                <th scope="row">Name</th>
                <th scope="row">From</th>
                <th scope="row">To</th>
                <th scope="row">Status</th>
            </thead>
            <tbody>
                @foreach ($competitions as $comp)
                  @if (isset($comp->id))
                    <tr>
                        <td>{{ $comp->id }}</td>
                        <td>{{ $comp->text_translates->where('lang_id', $lang)->first()->name }}</td>
                        <td>{{ $comp->valid_from->toFormattedDateString() }}</td>
                        <td>{{ $comp->valid_to->toFormattedDateString() }}</td>
                        <td>{{ $comp->status}}</td>
                    </tr>
                  @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
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
          <div class="text left">{{$categories->name}}</div>
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
          <div class="text">{!! $proposition->proposition_text !!}</div>
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
            <div class="text">{!! $proposition->proposition_text !!}</div>
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
              <div class="text">{!! $proposition->proposition_text !!}</div>
          @endif
      @endforeach
        </span>
  </div>

@endforeach
@endsection