<nav class="competitionNavbar navbar-expand-sm navbar-dark bg-black ">
        <ul class="nav">
                @foreach ($competition as $item)
                <li class="nav-item " id="info">
                        <a href="{{ url('/competitionInfo/{id}' . $item->id) }}" class="nav-link">{{ __('menu.competition_info') }}</a>
                </li>
                @endforeach
                <li class="nav-item " id="propositions">
                        <a href="{{ url('/') }}" class="nav-link">{{ __('menu.competition_propositions') }}</a>
                </li>
                <li class="nav-item " id="rules">
                        <a href="{{ url('/') }}" class="nav-link">{{ __('menu.competition_rules') }}</a>
                </li>
                <li class="nav-item " id="archive">
                        <a href="{{ url('/') }}" class="nav-link">{{ __('menu.competition_archive') }}</a>
                </li>
                <li class="nav-item " id="join">
                        <a href="{{ url('/') }}" class="nav-link">{{ __('menu.competition_join') }}</a>
                </li>
        </ul>
</nav>