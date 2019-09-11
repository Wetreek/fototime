@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="data">
        <table class="table table-dark">
            <thead>
                <th scope="row">ID</th>
                <th scope="row">User name</th>
                <th scope="row">First name</th>
                <th scope="row">Last name</th>
                <th scope="row">Role</th>
            </thead>
            <tbody>
                @foreach ($users as $users)
                  @if (isset($users->id))
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->username }}</td>
                        <td>{{ $users->fname}}</td>
                        <td>{{ $users->lname}}</td>
                        <td>{{ $users->user_role}}</td>
                        @if (auth()->user() && auth()->user()->isAdmin())
                        <td><a class="link" href="{{ url('edit', $users->id) }}">Edit</a></td>
                        {{-- <td><a class="link" href="{{ route('edit', ['user' => $users->id]) }}">Edit</a></td> --}}
                        @endif
                    </tr>
                  @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div> 
@endsection