@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
</div> 
@endsection