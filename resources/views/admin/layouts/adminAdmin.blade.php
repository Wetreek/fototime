@if (auth()->user() && auth()->user()->isAdmin())
<hr class="my-2">
<h3 class="pt-3">{{ __('messages.account') }}</h3>


<div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('messages.user_level') }}</label>

    <div class="col-md-6">
        <select class="form-control" id="role" name="user_role">
        @foreach (\App\Models\Role::all() as $item)
            @if (auth()->user())
            <option value="{{ $item->id }}" @if (auth()->user()->user_role == $item->id) {{ "selected" }} @endif >
                {{ $item->role }} </option>
            @else
            <option value="{{ $item->id }}"> {{ $item->role }} </option>
            @endif
        @endforeach
        </select>
    </div>
</div>
@endif
