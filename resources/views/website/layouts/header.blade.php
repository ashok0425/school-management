<header>
    <div class="header-area ">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="float-left col-md-6 location">
                        <a href="#">
                            <span class="border-right">
                              <i class="fas fa-phone p-r-5"></i> +45-8458082 , +45-8458082
                            </span>
                            <span>
                               <i class="far fa-envelope-open p-r-5"></i> contact_tour@gmail.com
                            </span>

                        </a>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xs-6 location text-lg-right">
                        <a href="#">
                            <span class="border-right"><i class="fas fa-desktop p-r-5"></i>Request a demo</span>
                            <span class="border-right"><i class="fas fa-book-reader p-r-5"></i>Resouces</span>
                            <span class="border-right"><i class="fas fa-info-circle p-r-5"></i>Request a demo</span>
                            <span class="border-right"><img class="img img-responsive fav-icon p-r-5" src="{{asset('images/icons8-usa-48.png')}}"> language</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row  no-gutters">
                    <div class="col-md-2 col-xl-2 col-lg-2 logo-img">
                        <a href="/">
                            <img src="{{asset('images/logo.png')}}" alt="">
                        </a>

                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation" class="menu-navigation">
                                    <li><a href="#" class="active"><i class="fas fa-phone-alt"></i>SOLUTIONS <i class="fas fa-caret-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="/services">Product</a></li>
                                            <li><a href="/services">industries</a></li>
                                            <li><a href="/faq">FAQ</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="/price-plans">PLANS AND PRICING </a>
                                    <li><a href="/contact-us">CONTACT SALES </a>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                        <ul class="cart-div ">
                            <li>
                                <a href="{{route('school.login')}}">
                                    <button class="btn btn-outline-primary btn-rounded "><i class="fas fa-user p-r-5"></i> Sign In</button>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('school.register')}}">
                                    <button class="btn btn-danger btn-rounded lyceex-danger"><i class="fas fa-sign-in-alt p-r-5"></i>Sign Up, Its Free</button>

                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>