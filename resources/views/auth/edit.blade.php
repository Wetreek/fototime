@extends('layouts.app')

@section('content')
<div class="container">
    @if ($user==null)
        {{ __('messages.userNotExist')}}
    @else 
        @include('auth.layouts.form')
    @endif 
       
</div>
@endsection
