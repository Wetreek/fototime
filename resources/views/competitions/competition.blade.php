@extends('layouts.app')

@section('content')
    <div class="container">
        <?php dd($competition) ?>
        <h1>{{ $competition->name }}</h1>
    </div>
    @include('competitions.competitionNavbar')
@endsection