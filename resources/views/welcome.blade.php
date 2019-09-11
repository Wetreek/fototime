@extends('layouts.app')

@section('content')
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
                  @if (isset($comp->competition_id))
                    <tr>
                        <td>{{ $comp->competition_id }}</td>
                        <td>{{ $comp->name }}</td>
                        <td>{{ $comp->competition->valid_from->toDateTimeLocalString()}}</td>
                        <td>{{ $comp->competition->valid_to }}</td>
                        <td>{{ $comp->competition->status}}</td>
                    </tr>
                  @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div> 
@endsection
