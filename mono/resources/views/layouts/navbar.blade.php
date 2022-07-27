<header id="header"><!--header-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('/') }}"><img src="https://cldup.com/5Ls4rnvFc4.png" width="80" height="80" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="{{ route('wishlist') }}"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-list"></i> My Orders</a></li>
                            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li><a href="#"><i class="fa fa-sign-out"></i> Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li><a href="{{ route('product') }}">Shop</a></li>
                            <li class="dropdown"><a href="#">Categories<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Categories 1</a></li>
                                    <li><a href="#">Categories 2</a></li>
                                    <li><a href="#">Categories 3</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
