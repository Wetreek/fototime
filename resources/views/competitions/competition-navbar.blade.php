<nav class="competitionNavbar navbar-expand-sm navbar-dark bg-black ">
        <ul class="nav">
                <li class="nav-item " id="info">
                                <a href="{{ url('/competitionOSutazi/' . $competition->competition_id) }}" class="nav-link">{{ __('menu.competition_OSutazi') }}</a>
                </li>
                {{--<li class="nav-item " id="archive">
                        <a href="{{ url('/') }}" class="nav-link">{{ __('menu.competition_archive') }}</a>
                </li>--}}
                <li class="nav-item " id="join">
                        <a href="{{ url('/') }}" class="nav-link">{{ __('menu.competition_join') }}</a>
                </li>
        </ul>
</nav>