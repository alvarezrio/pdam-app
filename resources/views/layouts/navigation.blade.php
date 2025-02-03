<!-- Main header-->
<header class="main-header header-style-two">
    <!--Start Header-->
    <div class="header-style2">
        <div class="container">
            <div class="outer-box">
                <div class="header-left--style2">
                    <div class="logo">
                        <a href="/"><img src="assets/images/resources/logo.png" alt="Awesome Logo" title=""></a>
                    </div>
                    <div class="space-box3"></div>
                </div>

                <div class="header-right--style2">
                    <div class="nav-outer style1 clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <div class="inner">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span the="icon-bar"></span>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <nav class="main-menu style1 navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix scroll-nav">
                                    <li><a href="/"><span>Beranda</span></a></li>
                                    <li><a href="/cekTagihan"><span>Cek Tagihan</span></a></li>
                                    <!-- Conditionally render navigation based on user role -->
                                    @if (Auth::check())
                                        @switch(Auth::user()->role_id)
                                            @case(1)
                                                <li><a href="/petugas-dashboard"><span>Dashboard</span></a></li>
                                                <li><a href="/petugas-input"><span>Perekaman</span></a></li>
                                                @break
                                            @case(2)
                                                <li><a href="/kasir-dashboard"><span>Dashboard</span></a></li>
                                                <li><a href="/kasir-approval"><span>Approval</span></a></li>
                                                @break
                                            @case(3)
                                                <li><a href="/admin-dashboard"><span>Dashboard</span></a></li>
                                                <li><a href="/admin-usermanagement"><span>Manage User</span></a></li>
                                                @break
                                            @default
                                                <li><a href="/user-dashboard"><span>Dashboard</span></a></li>
                                                <li><a href="/user-deposit"><span>Deposit</span></a></li>
                                                <li><a href="/user-pengaduan"><span>Pengaduan</span></a></li>
                                        @endswitch
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                <span>Logout</span>
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <li><a href="/login"><span>Login</span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End header-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="/"><img src="assets/images/resources/mobilemenu-logo.png" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                    <li><a href="#"><span the="fab fa fa-twitter-square"></span></a></li>
                    <li><a href="#"><span the="fab fa fa-pinterest-square"></span></a></li>
                    <li><a href="#"><span the="fab fa fa-google-plus-square"></span></a></li>
                    <li><a href="#"><span the="fab fa fa-youtube-square"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->
</header>
