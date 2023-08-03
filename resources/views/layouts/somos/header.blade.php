  <!-- Header
  ============================================= -->
  <header id="header" class="full-header">
      <div id="header-wrap">
          <div class="container">
              <div class="header-row">

                  <!-- Logo
      ============================================= -->
                  <div id="logo">
                      <a href="index.html">
                          <img class="logo-default" srcset="img/webpass-logo.png, img/webpass-logo.png 2x"
                              src="img/webpass-logo.png" alt="WebPass">
                          <img class="logo-dark" srcset="img/webpass-logo.png, img/webpass-logo.png 2x"
                              src="img/webpass-logo.png.png" alt="WebPass">
                      </a>
                  </div><!-- #logo end -->

                  <div class="header-misc">

                      <!-- Top Search
       ============================================= -->
                      <div id="top-search" class="header-misc-icon">
                          <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i
                                  class="bi-x-lg"></i></a>
                      </div><!-- #top-search end -->

                      <!-- Top Cart
       ============================================= -->
                      <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                          <a href="#" id="top-cart-trigger"><i class="uil uil-shopping-bag"></i><span
                                  class="top-cart-number">5</span></a>
                          <div class="top-cart-content">
                              <div class="top-cart-title">
                                  <h4>Shopping Cart</h4>
                              </div>
                              <div class="top-cart-items">
                                  <div class="top-cart-item">
                                      <div class="top-cart-item-image">
                                          <a href="#"><img src="images/shop/small/1.jpg"
                                                  alt="Blue Round-Neck Tshirt"></a>
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
                                          <a href="#"><img src="images/shop/small/6.jpg"
                                                  alt="Light Blue Denim Dress"></a>
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
                                  <a href="#" class="button button-3d button-small m-0">View Cart</a>
                              </div>
                          </div>
                      </div><!-- #top-cart end -->

                  </div>

                  <div class="primary-menu-trigger">
                      <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                          <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                      </button>
                  </div>

                  <!-- Primary Navigation
      ============================================= -->
                  <nav class="primary-menu">

                      <ul class="menu-container">
                          <li class="menu-item">
                              <a class="menu-link" href="{{ route('home') }}">
                                  <div>Inicio</div>
                              </a>

                          </li>
                          <li class="menu-item">
                              <a class="menu-link" href="{{ route('quienes-somos') }}">
                                  <div>Quienes somos</div>
                              </a>

                          </li>
                          <li class="menu-item mega-menu">
                              <a class="menu-link" href="{{ route('haces-falta') }}">
                                  <div>Haces falta</div>
                              </a>

                          </li>
                          <li class="menu-item mega-menu">
                              <a class="menu-link" href="{{ route('ellos-tambien-son-otros') }}">
                                  <div>Ellos también son otros</div>
                              </a>

                          </li>
                          <li class="menu-item mega-menu">
                              <a class="menu-link" href="{{ route('registrate') }}">
                                  <div>Registrate</div>
                              </a>

                          </li>

                      </ul>

                  </nav><!-- #primary-menu end -->

                  <form class="top-search-form" action="search.html" method="get">
                      <input type="text" name="q" class="form-control" value=""
                          placeholder="Type &amp; Hit Enter.." autocomplete="off">
                  </form>

              </div>
          </div>
      </div>
      <div class="header-wrap-clone"></div>
  </header><!-- #header end -->

  <!-- Header
  ============================================= -->
  {{-- <header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
     ============================================= -->
                <div id="logo" class="mx-auto">
                    <a href="index.html">
                        <img class="logo-default" srcset="img/webpass-logo.png, img/webpass-logo.png 2x"
                            src="img/webpass-logo.png" alt="WebPass">
                        <img class="logo-dark" srcset="img/webpass-logo.png, img/webpass-logo.png 2x"
                            src="img/webpass-logo.png.png" alt="WebPass">
                    </a>
                </div><!-- #logo end -->

            </div>
        </div>

        <div id="header-wrap" class="border-top border-f5">
            <div class="container">
                <div class="header-row justify-content-center">

                    <div class="header-misc">

                        <!-- Top Search
       ============================================= -->
                        <div id="top-search" class="header-misc-icon">
                            <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i
                                    class="bi-x-lg"></i></a>
                        </div><!-- #top-search end -->

                    </div>

                    <div class="primary-menu-trigger">
                        <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                            <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                        </button>
                    </div>

                    <!-- Primary Navigation
      ============================================= -->
                    <nav class="primary-menu">

                        <ul class="menu-container">
                            <li class="menu-item current"><a class="menu-link" href="#">
                                    <div>Home</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#">
                                    <div>Features</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#">
                                    <div>Categories</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#">
                                    <div>Authors</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#">
                                    <div>Portfolio</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#">
                                    <div>Blog</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#">
                                    <div>Contribute</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="#">
                                    <div>Contact</div>
                                </a></li>
                        </ul>

                    </nav><!-- #primary-menu end -->

                    <form class="top-search-form" action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value=""
                            placeholder="Type &amp; Hit Enter.." autocomplete="off">
                    </form>

                </div>

            </div>
        </div>
        <div class="header-wrap-clone"></div>
    </div>
</header> --}}
  <!-- #header end -->
