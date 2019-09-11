<h3 class="p-3">{{ __('messages.contact_details') }}</h3>

<div class="form-group row">
    <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('messages.Fname') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="fname" type="text" name="fname" value="{{ auth()->user()->fname }}" class="form-control" required>    
    @else
        <input id="fname" type="text" name="fname" class="form-control" required>
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('messages.Lname') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="lname" type="text" name="lname" value="{{ auth()->user()->lname }}" class="form-control" required>    
    @else
        <input id="lname" type="text" name="lname" class="form-control" required>
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="title_academic" class="col-md-4 col-form-label text-md-right">{{ __('messages.academic_title') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="title_academic" name="title_academic" value="{{ auth()->user()->title_academic }}" type="text" class="form-control">    
    @else
        <input id="title_academic" name="title_academic" type="text" class="form-control">
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="title_photo" class="col-md-4 col-form-label text-md-right">{{ __('messages.photo_title') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="title_photo" name="title_photo" type="text" value="{{ auth()->user()->title_photo }}" class="form-control">
    @else
        <input id="title_photo" name="title_photo" type="text" class="form-control">
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('messages.phone_number') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="phone" type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control">    
    @else
        <input id="phone" type="text" name="phone" class="form-control">
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('messages.address') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="street" type="text" name="street" value="{{ auth()->user()->street }}" class="form-control">    
    @else
        <input id="street" type="text" name="street" class="form-control">
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('messages.postal') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="postal_code" name="postal_code" value="{{ auth()->user()->postal_code }}" type="text" class="form-control">        
    @else
        <input id="postal_code" name="postal_code" type="text" class="form-control" required>
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('messages.city') }}</label>

    <div class="col-md-6">
    @if (auth()->user())
        <input id="city" type="text" name="city" value="{{ auth()->user()->city }}" class="form-control" required>            
    @else
        <input id="city" type="text" name="city" class="form-control" required>
    @endif
    </div>
</div>

<div class="form-group row">
    <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('messages.country') }}</label>

    <div class="col-md-6">
        <select class="form-control" id="country_id" name="country_id">
        @foreach (\App\Models\Country::all() as $item)
            @if (auth()->user())
                <option value="{{ $item->id }}" @if (auth()->user()->country_id == $item->id) {{ "selected" }} @endif > {{ $item->country }} </option>
            @else
                <option value="{{ $item->id }}"> {{ $item->country }} </option>
            @endif
        @endforeach
        </select>
    </div>
</div>
