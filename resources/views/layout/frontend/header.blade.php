<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header__top__inner">
                        <div class="header__top__left">
                            <ul>
                                {{-- <li>USD <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>EUR</li>
                                        <li>USD</li>
                                    </ul>
                                </li>
                                <li>ENG <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>Spanish</li>
                                        <li>ENG</li>
                                    </ul>
                                </li> --}}
                                @if (Auth::check())
                                    <li><a href="{{ route('logout') }}">Logout</a> <span class="arrow_carrot-down"></span>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}">Sign in</a> <span
                                            class="arrow_carrot-down"></span></li>
                                @endif
                            </ul>
                        </div>
                        <div class="header__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <div class="header__top__right">
                            <div class="header__top__right__links">
                                <a href="#" class="search-switch"><img src="img/icon/search.png"
                                        alt=""></a>
                                {{-- <a href="#"><img src="img/icon/heart.png" alt=""></a> --}}
                            </div>
                            @if (Auth::check())
                                <div class="header__top__right__cart">
                                    <a href="{{ route('frontend.order', ['id' => Auth::user()->id]) }}"><img
                                            src="img/icon/cart.png" alt=""></a>
                                </div>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="header__menu mobile-menu">
                    <ul>
                        @if (getRouteName() == 'home')
                            <li class="active"><a href="{{ route('home') }}">Trang chủ</a></li>
                        @else
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        @endif
                        @foreach (getCategory() as $item)
                            @if (currentURL() == route('frontend.product', ['id' => $item->id]))
                                <li class="active"><a
                                        href="{{ route('frontend.product', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                </li>
                            @else
                                <li><a
                                        href="{{ route('frontend.product', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                </li>
                            @endif
                        @endforeach
                        {{-- <li><a href="./about.html">About</a></li>
                        <li><a href="./shop.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./wisslist.html">Wisslist</a></li>
                                <li><a href="./Class.html">Class</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
