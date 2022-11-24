<ul class="navbar-nav mr-auto">
    <li class="nav-item {{ request()->route()->getName() == 'shop.index' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('shop.index') }}">Shop</a>
    </li>
    <li class="nav-item {{ request()->route()->getName() == 'how_to.index' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('how_to.index') }}">How to</a>
    </li>
</ul>