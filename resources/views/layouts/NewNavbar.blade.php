<?php

$competitionsSidenav = \App\Models\Competition::where('status', 0)->get();

$lang = app()->getLocale() == "sk" ? 1 : 2; ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-black">
            <div class="hamburger sidenav-toggle hamburger--elastic" tabindex="0"
                 aria-label="Menu" aria-controls="navigation">
                <div class="hamburger-box">
                <div class="hamburger-inner"></div>
                </div>
            </div>
        {{-- <div class="animated-icon2 sidenav-toggle"><span></span></div> --}}
        <ul class="nav">
            <li class="nav-item " id="faq">
                <a href="{{ url('/about') }}" class="nav-link">FAQ</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">FOTOTIME</a>
            </li>
        </ul>
            <ul class="nav ml-auto" id="auth">
            <div class="mt-2" id="flag">
                <span class="flag">
                    <a href="{{ url('/lang/sk') }}"><img src="{{ asset('img/slovak_flag.png') }}" alt="SK"></a>
                </span>
                <span class="flag">
                    <a href="{{ url('/lang/en') }}"><img src="{{ asset('img/uk_flag.png') }}" alt="UK"></a>
                </span>
            </div>
        @guest   
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                </li>
            @endif
        @endguest
        @auth
            <li class="nav-item">
                <a id="top-navbar-toggle" class="nav-link" href="#" role="button" >
                    {{ Auth::user()->fname }} <span class="caret"></span>
                </a>
            </li>
        @endauth
        </ul>
    </nav>
    
    <div id="overlay"></div>
    
    <div class="sidenav">
        <ul class="navbar-nav text-center "> 
            @guest
                <li class="collapsible-header" id="guestProfile"><a data-toggle="collapse" href="#profil" id="profileToggle"> {{ __('menu.profile') }}</a>
                    <div class="collapsible-body">
                        <ul class="collapse list-unstyled" id="profil">
                            <li class="s-item"><a href="{{ route('login') }}">
                                {{ __('messages.login') }}
                            </a></li>
                        @if (Route::has('register'))
                            <li class="s-item"><a href="{{ route('register') }}">
                                {{ __('messages.register') }}
                            </a></li>
                        @endif
                        </ul>
                    </div>   
                </li>
                @endguest
                @auth
                    <li class="collapsible-header" id="userProfile"><a data-toggle="collapse" href="#user" id="profileToggle">
                            {{ Auth::user()->fname }} <span class="caret"></span>
                        </a>
        
                        <div class="collapsible-body">
                            <ul class="collapse list-unstyled" id="user">
                             <li class="s-item"><a  href={{ route('profile') }}>
                                {{ __('messages.edit') }}
                            </a></li>
                            
                            <li class="s-item"><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('messages.logout') }}
                            </a>
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></li>
                        </ul>
                        </div>
                    </li>
                @endauth
            <li class="nav-item"><a class="nav-link" href={{ route('gallery')}}>{{ __('menu.photo_gallery') }}</a></li>
            @if (auth()->user())
                    <li class="nav-item"><a class="nav-link" href={{ route('mygallery')}}> {{ __('menu.my_photos') }}</a></li>
            @endif
            <li class="collapsible-header waves-effect arrow-r"><a href="#homeSubmenu" data-toggle="collapse" id="competitionToggle"> {{ __('menu.competitions') }}</a>
            <?php 
            ?>
               @foreach ($competitionsSidenav as $item)
                <div class="collapsible-body">
                <ul class="collapse list-unstyled" id="homeSubmenu">
                <li class="s-item"><a href="{{ url('/competition/' . $item->id)}}" class="waves-effect">{{ $item->text_translates->where('lang_id', $lang)->first()->name}}</a></li>
                </ul>
                </div>
                @endforeach
            </li>
             @if (auth()->user() && auth()->user()->isAdmin())
            <li class="nav-item"> {{ __('menu.fees') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('users') }}"> {{ __('menu.users') }}</a></li>
            <li class="nav-item"> {{ __('menu.payments') }}</li>
            <li class="nav-item"> {{ __('menu.rating') }}</li> 
            @endif 
            <li class="nav-item">{{ __('menu.about_us') }}</li>
            <li class="nav-item">{{ __('menu.events') }}</li>
            <li class="nav-item">{{ __('menu.contact') }}</li>
            <li class="nav-item " id="mobileFaq">
                    <a href="{{ url('/about') }}" class="nav-link">FAQ</a>
                </li>
            <li class="nav-item">
                <div class="mt-2" id="mobileFlag">
                    <span class="flag">
                        <a href="{{ url('/lang/sk') }}"><img src="{{ asset('img/slovak_flag.png') }}" alt="SK"></a>
                    </span>
                    <span class="flag">
                        <a href="{{ url('/lang/en') }}"><img src="{{ asset('img/uk_flag.png') }}" alt="UK"></a>
                    </span>
                </div>
            </li>
        </ul>
    </div>
    <div class="top-navbar">
        <ul class="navbar-nav text-center">
            <li class="nav-item"><a href={{ route('profile') }}>
                {{ __('messages.edit') }}
            </a></li>
            
            <li class="nav-item"><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('messages.logout') }}
            </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
