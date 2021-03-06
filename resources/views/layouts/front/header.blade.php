<header class="header clearfix">
    <div class="top-header-group">
        <div class="top-header">
            <div class="res_main_logo">
                <a href="{{route('home')}}">
                    <img src="{{$gs->company_logo}}" alt="">
                </a>
            </div>
            <div class="main_logo" id="logo">
                <a href="{{route('home')}}">
                    <img src="{{$gs->company_logo}}" alt="">
                </a>
                <a href="{{route('home')}}">
                    <img class="logo-inverse" src="{{$gs->company_logo}}" alt="">
                </a>
            </div>
            <div class="select_location">
                <div class="ui inline dropdown loc-title">
                    <div class="text">
                        <i class="uil uil-location-point"></i> Gurugram
                    </div>
                    <i class="uil uil-angle-down icon__14"></i>
                    <div class="menu dropdown_loc">
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> Gurugram
                        </div>
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> New Delhi
                        </div>
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> Bangaluru
                        </div>
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> Mumbai
                        </div>
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> Hyderabad
                        </div>
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> Kolkata
                        </div>
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> Ludhiana
                        </div>
                        <div class="item channel_item">
                            <i class="uil uil-location-point"></i> Chandigrah
                        </div>
                    </div>
                </div>
            </div>
            <div class="search120">
                <div class="ui search">
                    <div class="ui left icon input swdh10">
                        <input class="prompt srch10" type="text" placeholder="Search for products..">
                        <i class='uil uil-search-alt icon icon1'></i>
                    </div>
                </div>
            </div>
            <div class="header_right">
                <ul>
                    <li>
                        <a href="#" class="offer-link">
                            <i class="uil uil-phone-alt"></i>1800-000-000
                        </a>
                    </li>
                    <li>
                        <a href="#" class="offer-link">
                            <i class="uil uil-gift"></i>Offers
                        </a>
                    </li>
                    <li>
                        <a href="#" class="offer-link">
                            <i class="uil uil-question-circle"></i>Help
                        </a>
                    </li>
                    <li>
                        <a href="#" class="option_links" title="Wishlist">
                            <i class='uil uil-heart icon_wishlist'></i>
                            <span class="noti_count1">3</span>
                        </a>
                    </li>
                    <li class="ui dropdown">
                        <a href="#" class="opts_account">
                            <img src="{{asset('front/images/avatar/img-5.jpg')}}" alt="">
                            <span class="user__name">John Doe</span>
                            <i class="uil uil-angle-down"></i>
                        </a>
                        <div class="menu dropdown_account">
                            <div class="night_mode_switch__btn">
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <i class="uil uil-moon"></i> Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                            </div>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-apps icon__1"></i>Dashbaord
                            </a>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-box icon__1"></i>My Orders
                            </a>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-heart icon__1"></i>My Wishlist
                            </a>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-usd-circle icon__1"></i>My Wallet
                            </a>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-location-point icon__1"></i>My Address
                            </a>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-gift icon__1"></i>Offers
                            </a>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-info-circle icon__1"></i>Faq
                            </a>
                            <a href="#" class="item channel_item">
                                <i class="uil uil-lock-alt icon__1"></i>Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sub-header-group">
        <div class="sub-header">
            <div class="ui dropdown">
                <a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories">
                    <i class="uil uil-apps"></i>
                    <span class="cate__icon">Select Category</span>
                </a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                <div class="container-fluid">
                    <button class="navbar-toggler menu_toggle_btn" type="button"
                        data-target="#navbarSupportedContent"><i class="uil uil-bars"></i></button>
                    <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav main_nav align-self-stretch">
                            <li class="nav-item">
                                <a href="{{route('home')}}" class="nav-link active" title="Home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link new_item" title="New Products">New Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" title="Featured Products">Featured Products</a>
                            </li>
                            <li class="nav-item">
                                <div class="ui icon top left dropdown nav__menu">
                                    <a class="nav-link" title="Pages">Pages <i class="uil uil-angle-down"></i>
                                    </a>
                                    <div class="menu dropdown_page">
                                        <a href="#" class="item channel_item page__links">Account</a>
                                        <a href="#" class="item channel_item page__links">About Us</a>
                                        <a href="#" class="item channel_item page__links">Shop Grid</a>
                                        <a href="#" class="item channel_item page__links">Single Product View</a>
                                        <a href="#" class="item channel_item page__links">Checkout</a>
                                        <a href="#" class="item channel_item page__links">Product Request</a>
                                        <a href="#" class="item channel_item page__links">Order Placed</a>
                                        <a href="#" class="item channel_item page__links">Bill Slip</a>
                                        <a href="#" class="item channel_item page__links">Sign In</a>
                                        <a href="#" class="item channel_item page__links">Sign Up</a>
                                        <a href="#" class="item channel_item page__links">Forgot Password</a>
                                        <a href="#" class="item channel_item page__links">Contact Us</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="ui icon top left dropdown nav__menu">
                                    <a class="nav-link" title="Blog">Blog <i class="uil uil-angle-down"></i></a>
                                    <div class="menu dropdown_page">
                                        <a href="#" class="item channel_item page__links">Our Blog</a>
                                        <a href="#" class="item channel_item page__links">Blog Detail View</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="contact_us.html" class="nav-link" title="Contact">ContactUs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="catey__icon">
                <a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories">
                    <i class="uil uil-apps"></i>
                </a>
            </div>
            <div class="header_cart order-1">
                <a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart">
                    <i class="uil uil-shopping-cart-alt"></i>
                    <span>Cart</span><ins>2</ins>
                    <i class="uil uil-angle-down"></i>
                </a>
            </div>
            <div class="search__icon order-1">
                <a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search">
                    <i class="uil uil-search"></i>
                </a>
            </div>
        </div>
    </div>
</header>