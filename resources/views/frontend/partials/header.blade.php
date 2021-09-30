<header class="header">  <!-- Header Start Here-->

    <div class="header_top">  <!-- Header Top Start Here-->
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="contactinfo">
                        <ul>
                            <li><a href=""><i class="fas fa-phone-volume"></i> +2 95 01 88 821</a></li>
                            <li><a href=""><i class="far fa-envelope"></i> info@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="social-icon float-right">
                        <ul>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href=""><i class="fas fa-globe"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>        <!-- Header Top End Here-->


    <div class="main_header">  <!-- Main Header Start Here-->
        <div class="container">
            <div class="header-main">
                <div class="row">

                    <div class="col-md-6">
                        <div class="header-logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('frontend/img/blogo.png') }}" alt="">
                                <h3><span>E</span>-BAZZAR</h3>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="header-account float-right">
                            <ul>
                                <li><a href=""><i class="fas fa-star"></i> Wishlist</a></li>
                                <li><a href="{{ route('carts') }}" class="badge badge-danger bsdgeclass"><i class="fas fa-cart-plus"></i> Cart <span class="badge badge-warning" id="totalItems">{{ App\Models\Cart::totalItems() }}</span></a></li>
                                @if(@Auth::user()->id != NULL && @Auth::user()->usertype == 'customer')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('customer.login') }}"><i class="fas fa-lock"></i> Login</a></li>
                                    <li><a href="{{ route('customer.signup') }}"><i class="fas fa-users-cog"></i> Register</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>    <!-- Main Header End Here-->


    <div class="header_nav">   <!-- Navbar Start Here-->

        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Route::is('index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index') }}"><i class="fas fa-house-damage"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ Route::is('products') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('products') }}">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>

                        <li class="nav-item {{ Route::is('contacts') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contacts') }}">Contact</a>
                        </li>
                        @if(@Auth::user()->id != NULL && @Auth::user()->usertype == 'customer')
                            <li>
                                <a class="nav-link" href="{{ route('customer.dashboard') }}" style="color: blue;">{{ Auth::user()->name }}</a>
                            </li>
                        @endif


                    </ul>

                    <form action="{{ route('product.search') }}" method="get" class="form-inline my-2 my-lg-0">
                        <div class="input-group">

                            <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Input group example" aria-describedby="btnGroupAddon">

                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-success search_button" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>

                        </div>
                    </form>

                </div>
            </nav>
        </div>
    </div>            <!-- Navbar End Here-->



</header>  <!-- Header End Here-->