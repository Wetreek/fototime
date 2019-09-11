<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
            
                <h3 class="pt-3">{{ __('messages.login_details') }}</h3>
        
            @if (auth()->user())
                {{-- <form method="POST" action="{{ url($formAction.'/' . $user->id) }}"> --}}
                <form method="POST" action="{{ url($formAction) }}">
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $user->id }}">
                @csrf
            @else
                <form method="POST" action="{{ route('register') }}">
                @csrf
            @endif    
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right" >{{ __('messages.email') }}</label>

                    <div class="col-md-6">
                        @if (auth()->user())
                            <input id="email" type="email" class="form-control" value="{{ $user->username }}" name="email" disabled autocomplete="email">
                        @else
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @endif
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                    
                @if (auth()->user())
                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.new_password') }}</label>
    
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.confirm_password') }}</label>
    
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                @else
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.confirm_password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                @endif
                    <hr class="my-2">
                @include('auth.layouts.contact')
                @include('auth.layouts.admin')
                
                @if (auth()->user())
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('messages.edit') }}
                            </button>
                        </div>
                    </div>                        
                @else
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('messages.register') }}
                            </button>
                        </div>
                    </div>
                @endif
                </form>
            </div>
        </div>
    </div>
</div>