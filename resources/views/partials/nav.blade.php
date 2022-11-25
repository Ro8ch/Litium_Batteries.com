<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="nav-brand" href="{{ url('/') }}">
        <div>
            <img src="{{ asset('Images/Logo-nav.png')}}" height= 63 width = 201>
        </div>
    </a>
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{ menu('main', 'partials.menu.main') }}
            <div>
                <input id="search" name="search" style="width:400px; margin:0;" id="search" class="form-control custom-border" placeholder="Search" aria-label="Search">
            </div>
        </div>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            @if (auth()->user()->can('browse_admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin') }}">Admin Panel</a>
            </li>
            @endif
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->getName() == 'cart.index' ? 'active': '' }}" href="{{ route('cart.index') }}">
                    Cart 
                @if (Cart::instance('default')->count() > 0)
                    <span class="badge badge-primary">
                        {{ Cart::instance('default')->count() }}
                    </span>
                @endif
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>
<div id="cont">
    <ul style="height:4em">

    </ul>
</div>
<script>
    var searcher = $('#search')
    searcher.on('keypress', function(e) {
        if (e.which == 13) {
            if (searcher.val().length > 2) {
                location.href = '/shop/search/' + searcher.val();
            } else {
                alert('Minimun query length is 3');
            }
        }
    });

</script>
