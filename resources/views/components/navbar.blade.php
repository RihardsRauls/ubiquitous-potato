<nav class="navbar bg-light">
    <div class="container">
        @auth
            <a href="{{ route('vehicles.index') }}" class="btn btn-primary">{{ __('messages.vehicles') }}</a>

            <div class="font-weight-bold">
                Riga: {{ $rigaTemp }}°C
            </div>

            <form method="POST" action="{{ route('language.update') }}">
                @csrf
                <button type="submit" name="language" value="lv" class="btn btn-danger me-2"
                    @if(Auth::user()->language == 'lv') style="font-weight: bold;" @endif>
                    LV
                </button>

                <button type="submit" name="language" value="en" class="btn btn-primary"
                    @if(Auth::user()->language == 'en') style="font-weight: bold;" @endif>
                    ENG
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary">{{ __('messages.logout') }}</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endguest
    </div>
</nav>
