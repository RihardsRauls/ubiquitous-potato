<nav class="navbar bg-light">
    <div class="container">
        @auth
            <a href="{{ route('listing.index') }}" class="btn btn-primary">All Listings</a>
            @can('create', \App\Models\Listing::class)
            <a href="{{ route('listing.create') }}" class="btn btn-primary">Create Listing</a>
            @endcan
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endguest
    </div>
</nav>
