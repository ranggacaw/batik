<!-- Header
============================================= -->
<header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ url('/') }}" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="{{asset ('images/logo/logo.png')}}" alt="Logo"></a>
                    <a href="{{ url('/') }}" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="{{asset ('images/logo/logo.png')}}" alt="Logo"></a>
                </div><!-- #logo end -->

                <div class="header-misc">

                    {{-- <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                    </div><!-- #top-search end --> --}}

                    @auth
                        <?php 
                            $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                            if (!empty($pesanan_utama)) {
                                $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            }
                            else {
                                $notif = 0;
                            }
                        ?>
                        <!-- Top Cart
                        ============================================= -->
                        <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                            <a href="{{ url('checkout') }}">
                                <i class="icon-line-bag"></i>
                                <span class="top-cart-number">{{ $notif }}</span>
                            </a>
                            
                            {{-- <a href="{{ url('checkout') }}" id="top-cart-trigger">
                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <h4>Shopping Cart</h4>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <div class="top-cart-item-desc-title">
                                                <a href="#">Blue Round-Neck Tshirt with a Button</a>
                                                <span class="top-cart-item-price d-block">$19.99</span>
                                            </div>
                                            <div class="top-cart-item-quantity">x 2</div>
                                        </div>
                                    </div>
                                    <div class="top-cart-item">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <div class="top-cart-item-desc-title">
                                                <a href="#">Light Blue Denim Dress</a>
                                                <span class="top-cart-item-price d-block">$24.99</span>
                                            </div>
                                            <div class="top-cart-item-quantity">x 3</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-cart-action">
                                    <span class="top-checkout-price">$114.95</span>
                                    <a href="{{ url('checkout') }}" class="button button-3d button-small m-0">View Cart</a>
                                </div>
                            </div> --}}
                        </div><!-- #top-cart end -->
                    @endauth

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">
                        <!-- Authentication Links -->
                        @guest
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('login') }}"><div>Login</div></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ route('register') }}"><div>Register</div></a>
                                </li>
                            @endif
                        @else
                            <li class="menu-item">
                                <a class="menu-link" href="{{ url('/') }}"><div>{{ __('Home') }}</div></a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('home') }}"><div>{{ __('Barang') }}</div></a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="#"><div>{{ Auth::user()->name }}</div></a>
                                <ul class="sub-menu-container">
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url('history') }}"><div>Checkout History</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url('profile') }}"><div>Profile</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><div>{{ __('Logout') }}</div></a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>

                </nav><!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->