<header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">
                <!-- Logo ============================================= -->
                <div id="logo">
                    <a href="{{route('home')}}" class="standard-logo" data-dark-logo="{{asset('images/orange.png')}}">
                        <img src="{{asset('images/black.png')}}" alt="{{ config('app.name') }}">
                    </a>
                    <a href="{{route('home')}}" class="retina-logo" data-dark-logo="{{asset('images/orange.png')}}">
                        <img src="{{asset('images/black.png')}}" alt="{{ config('app.name') }}">
                    </a>
                </div>
                <div class="col md 12" id="logo">
                <h1>Sistem Informasi UMKM Laguboti</h1>
                </div>
                <!-- #logo end -->
                <div class="header-misc">
                    <!-- Top Search ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="javascript:void(0);" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                    </div>
                    @auth
                    <div class="dropdown mx-3 mr-lg-0">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> {{ Auth::user()->name }} <i class="icon-user"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <!-- <a class="dropdown-item text-left" href="#">Profile</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item text-left" href="{{route('logout')}}">Logout <i class="icon-signout"></i></a>
                        </ul>
                    </div>
                    @endauth
                </div>
                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>
                <!-- Primary Navigation ============================================= -->
    @php
    $count = DB::table('merchants')->where('user_id', Auth::user()->id)->count();
    @endphp
                <nav class="primary-menu">
                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('home')}}"><div>Beranda</div></a>
                        </li>
                    </ul>
                </nav>
    @if ($count = 1)
                <nav class="primary-menu">
                    <ul class="menu-container">
                        <li class="menu-item">
                        <a href="javascript:void(0);" onclick="open_modal('#ModalCreateMerchant');" class="menu-link"><div>Daftar UMKM</div></a>
                        </li>
                    </ul>
                </nav>
    @endif
                <!-- #primary-menu end -->
                <form class="top-search-form" id="content_filter">
                    <input type="text" name="keywords" class="form-control" value="" placeholder="Ketik Lalu Tekan Enter" autocomplete="off">
                </form>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>