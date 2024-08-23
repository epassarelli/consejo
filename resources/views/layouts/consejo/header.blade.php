<!-- Header
============================================= -->
<header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
    ============================================= -->
                <div id="logo">
                    <a href="{{ route('home') }}">
                        <img class="logo-default" src="{{ asset('img/logo_uba.svg') }}" alt="UBA">
                        {{-- <img class="logo-dark" srcset="{{ asset('img/uba.png, img/uba.png 2x') }}" src="img/uba.png" alt="UBA"> --}}
                    </a>
                </div><!-- #logo end -->


                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>

                @include('layouts.consejo.nav')

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value=""
                        placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->
