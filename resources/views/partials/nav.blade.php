<header class="header">
    <div class="container">
        <div class="header__body">
            <a href="/" class="header__logo">
                <img src="img/logo_1.jpg" alt="" />
            </a>
            <div class="header__burger">
                <span></span>
            </div>
            <nav class="header__menu">
                <ul class="header__list">
                    <li>
                        <a href="/" class="header__link">Home</a>
                    </li>
                    <li>
                        <a href="/posts" class="header__link">Posts</a>
                    </li>
                    @auth
                        <li>
                            <a href="{{route('posts.index')}}" class="header__link">Admin</a>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="header__link">Auth</a>
                        </li>
                    @else
                    <li>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu__username">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="dropdown-menu__btns" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                    @endguest

                </ul>
            </nav>
        </div>
    </div>
</header>