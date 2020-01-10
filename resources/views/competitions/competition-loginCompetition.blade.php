@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                
                    <h1 class="pt-3 text-center">{{ __('messages.registration_competition') }}</h1>
                    <h2 class="pt-3 text-center">{{$competition->name }}<h2>
                    <hr class="my-2">
                    <p>{{ Auth::user()->username }} ({{ Auth::user()->fname }} {{ Auth::user()->lname }})<p>
                            <form method="POST" action="{{ route('login') }}">
                                    @csrf
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                    <label class="form-check-label" for="agreement">
                                        <input class="form-check-input" type="checkbox" name="agreement" id="agreement">
                                        {{ __('messages.agreement') }}
                                    </label>
                                </div>
                        </div>
                    <p>{{ __('messages.attachments') }}<p>
                    <hr class="my-2">  
                    <h3 class="pt-3">{{ __('messages.ageDeclaration') }}<h3>
                    <p>{{__('messages.declaration')}}</p>
                    @foreach($ageSubcategories as $item)
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check"> 
                                <label class="form-check-label">
                                    <input id="ageCheckBox{{$item->id}}" class="form-check-input" type="checkbox" name="ageSubcategoriesList[]" value={{$item->id}} >
                                    {{$item->name}}
                                </label>
                            </div>
                        <br>
                        </div>
                        @endforeach
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-11">
                        <button type="submit" class="btn btn-primary ">
                                {{ __('messages.save') }}
                        </button>
                            </div>
                        </div>
                        </span>
                            </form>
@endsection