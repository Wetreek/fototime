@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                
                    <h1 class="pt-3 text-center">{{ __('messages.detailPhoto') }}</h1>
                    <br>
            <form enctype="multipart/form-data" method="POST" action="/addPhoto">
                {{method_field('POST')}}
                @csrf
                <input id="category_id" type="text"  name="category_id" value="{{$id}}" readonly class="d-none" >
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.ageCategory') }}</label>

                    <div class="col-md-6">
                        <select name="ageCategory" id="ageCategory" class="form-control">
                            <option value="0">16</option>
                            <option value="1">20</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('messages.description') }}</label>

                    <div class="col-md-6">
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('messages.location') }}</label>

                    <div class="col-md-6">
                        <input id="location" type="text" class="form-control" name="location">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gps" class="col-md-4 col-form-label text-md-right">GPS</label>

                    <div class="col-md-6">
                        <input id="gps" type="text" class="form-control" name="gps">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPhoto" class="col-md-4 col-form-label text-md-right">Photo</label>

                    <div class="col-md-6">
                       {{-- <input id="inputPhoto" type="file"  name="photo" accept="image/jpeg" width="{{$photoInfo->min_width}}" height="{{$photoInfo->min_height}}" required>--}}
                        <input id="inputPhoto" type="file"  name="photo" accept="image/jpeg" width=225 height=225 required>
                    </div>
                </div>
                <span id="invalidPhotoDimensions" class="invalid-feedback" role="alert">
                    <strong>Rozmery obrazka nie su spravne</strong>
                </span>
                <span id="invalidPhotoType" class="invalid-feedback" role="alert">
                    <strong>Typ obrazka nie je spravny</strong>
                </span>
                <div class="preview-wrap">
                <img src="" alt="" class="upload-image-preview" id="previewPhoto">
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-11">
                <button type="submit" id="btnPhotoUpload" class="btn btn-primary ">
                        Upload
                </button>
            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
