<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" target="_blank" href="https://duplitrade.com">Duplitrade</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @if(auth()->check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}" tabindex="-1" aria-disabled="true">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}" tabindex="-1" aria-disabled="true">Register</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
