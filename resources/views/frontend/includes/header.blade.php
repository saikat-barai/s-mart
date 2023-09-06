<header class="site-header header-opt-1 cate-show">

    <!-- header-top -->
    <div class="header-top">
        <div class="container">

            <!-- nav-left -->
            <ul class="nav-left">
                <li><span><i class="fa fa-phone" aria-hidden="true"></i>+8801516533608</span></li>
                <li><span><i class="fa fa-envelope" aria-hidden="true"></i> Contact us today !</span></li>
                {{-- <li class="dropdown switcher  switcher-currency">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger"><span>USD</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu switcher-options ">
                        <li class="switcher-option">
                            <a href="#">
                                <i class="fa fa-usd" aria-hidden="true"></i> USD
                            </a>
                        </li>
                        <li class="switcher-option">
                            <a href="#">
                                <i class="fa fa-eur" aria-hidden="true"></i> eur
                            </a>
                        </li>
                        <li class="switcher-option">
                            <a href="#">
                                <i class="fa fa-gbp" aria-hidden="true"></i> gbp
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="dropdown switcher  switcher-language">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger" aria-expanded="false">
                        <img class="switcher-flag" alt="flag" src="{{ asset('public/frontend') }}/images/flags/flag_english.png">
                        <span>English</span> 
                        <i aria-hidden="true" class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu switcher-options ">
                        <li class="switcher-option">
                            <a href="#">
                                <img class="switcher-flag" alt="flag" src="{{ asset('public/frontend') }}/images/flags/flag_english.png">English
                            </a>
                        </li>
                        <li class="switcher-option">
                            <a href="#">
                                <img class="switcher-flag" alt="flag" src="{{ asset('public/frontend') }}/images/flags/flag_french.png">French
                            </a>
                        </li>
                        <li class="switcher-option">
                            <a href="#">
                                <img class="switcher-flag" alt="flag" src="{{ asset('public/frontend') }}/images/flags/flag_germany.png">Germany
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul><!-- nav-left -->

            <!-- nav-right -->
            <ul class=" nav-right">
                @if (Auth::user())
                <li class="dropdown setting">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>My
                            Account</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                    <div class="dropdown-menu  ">
                        <ul class="account">
                            <li><a href="{{ route('customer.profile') }}">My Account</a></li>
                            <li><a href="{{ route('customer.password.change') }}">My Account</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Compare</a></li>
                            <li><a href="{{ route('customer.logout') }}">LogOut</a></li>
                            <li><a href="{{ route('login') }}">Login/Register</a></li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="dropdown setting">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>My
                            Account</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                    <div class="dropdown-menu  ">
                        <ul class="account">
                            <li><a href="{{ route('login') }}">Login/Register</a></li>
                        </ul>
                    </div>
                </li>
                @endif
                
                <li><a href="#">Services</a></li>
                <li><a href="#">Support </a></li>
            </ul><!-- nav-right -->

        </div>
    </div><!-- header-top -->

    <!-- header-content -->
    <div class="header-content">
        <div class="container">

            <div class="row">

                <div class="col-md-3 nav-left">

                    <!-- logo -->
                    <strong class="logo">
                        <a href="{{ route('/') }}"><img
                                src="{{ asset('public/files') }}/logo/logo.png" alt="logo"></a>
                    </strong>

                </div>

                <div class="nav-right">

                    <!-- block mini cart -->
                    <div class="block-minicart dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="cart-icon"></span>
                            <span class="counter qty">
                                <span class="cart-text">Shopping Cart</span>
                                <span class="counter-number">6</span>
                                <span class="counter-label">6 <span>Items</span></span>
                                <span class="counter-price">$75.00</span>
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            @if (Auth::user())
                            
                            @if (App\Models\Cart::where('customer_id', Auth::user()->id)->count() != '0')
                            <form action="{{ route('cart') }}" method="GET">
                                @csrf
                                <div class="minicart-content-wrapper">
                                    <div class="subtitle">
                                        You have <strong style="color: blue">{{ App\Models\Cart::where('customer_id', Auth::user()->id)->count() }}</strong> item(s) in your cart
                                    </div>
                                    @php
                                        $total = 0;
                                    @endphp
                                    <div class="minicart-items-wrapper">
                                        <ol class="minicart-items">
                                            
                                            @foreach (App\Models\Cart::where('customer_id', Auth::user()->id)->get() as $cart)
                                            <li class="product-item" style="gap: 20px;">
                                                <a class="product-item-photo" href="#" title="Remove Product">
                                                    <img style="padding-left: 10px;" class="product-image-photo"
                                                        src="{{ asset('public/files/product/preview') }}/{{ $cart->rel_to_product->preview }}"
                                                        alt="The Name Product">
                                                </a>
                                                <div class="product-item-details">
                                                    <strong class="product-item-name">
                                                        <a href="#">{{ $cart->rel_to_product->product_name }}</a>
                                                    </strong>
                                                    <div class="product-item-price">
                                                        <span class="price">&#2547; {{ $cart->rel_to_product->after_discount_price }} &#215; {{ $cart->quantity }}</span>
                                                    </div>
                                                    {{-- <div class="product-item-qty">
                                                        <span class="label">Qty: </span><span class="number">{{ $cart->quantity }}</span>
                                                    </div> --}}
                                                    <div class="product-item-actions" style="padding-right: 10px">
                                                        <a class="action delete" href="{{ route('cart.delete', ['id'=>$cart->id]) }}" title="Remove item">
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            @php
                                                $total  += $cart->rel_to_product->after_discount_price*$cart->quantity;
                                            @endphp
                                            @endforeach
                                        </ol>
                                    </div>
                                    <div class="subtotal" style="padding: 30px;">
                                        <span class="label">Total</span>
                                        <span class="price">&#2547; {{ $total }}</span>
                                    </div>
                                    <div class="actions">
                                        <!-- <a class="btn btn-viewcart" href="">
                                            <span>Shopping bag</span>
                                        </a> -->
                                        <button class="btn btn-checkout" type="submit" title="Check Out">
                                            <span>Checkout</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                                <P class="text-center">Item empty</P>
                            @endif

                            @else
                                <p>No items</p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="nav-mind">

                    <!-- block search -->
                    <div class="block-search">
                        <div class="block-title">
                            <span>Search</span>
                        </div>
                        <div class="block-content">
                            <div class="categori-search  ">
                                <select data-placeholder="All Categories" class="categori-search-option">
                                    <option>All Categories</option>
                                    <option>Fashion</option>
                                    <option>Tops Blouses</option>
                                    <option>Clothing</option>
                                    <option>Furniture</option>
                                    <option>Bathtime Goods</option>
                                    <option>Shower Curtains</option>
                                </select>
                            </div>
                            <div class="form-search">
                                <form>
                                    <div class="box-group">
                                        <input type="text" class="form-control"
                                            placeholder="i'm Searching for...">
                                        <button class="btn btn-search" type="button"><span>search</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div><!-- header-content -->

    <!-- header-nav -->
    <div class="header-nav mid-header">
        <div class="container">

            <div class="box-header-nav">

                <!-- btn categori mobile -->
                <span data-action="toggle-nav-cat"
                    class="nav-toggle-menu nav-toggle-cat"><span>Categories</span></span>

                <!-- btn menu mobile -->
                <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span></span>

                <!--categori  -->
                <div class="block-nav-categori">

                    <div class="block-title">
                        <span>Categories</span>
                    </div>

                    <div class="block-content">
                        <div class="clearfix"><span data-action="close-cat"
                                class="close-cate"><span>Categories</span></span></div>
                        <ul class="ui-categori">
                            @php
                                $categories = DB::table('categories')->get();
                            @endphp
                            @foreach ($categories as $category)
                            <li class="parent">
                                <a href="#">
                                    <span class="icon"><img style="width: 20px"
                                            src="{{ asset('public/files/category') }}/{{ $category->category_image }}"
                                            alt="nav-cat"></span>  {{ $category->category_name }}
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu">
                                    <ul class="categori-list">
                                        @php
                                        $subcategories = DB::table('subcategories')
                                            ->where('category_id', $category->id)
                                            ->get();
                                    @endphp
                                    @foreach ($subcategories as $subcategory)
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="#">{{ $subcategory->subcategory_name }}</a></strong>
                                            <ul>
                                                <li><a href="#">Skirts </a></li>
                                                <li><a href="#">Jackets</a></li>
                                                <li><a href="#">Jumpusuits</a></li>
                                                <li><a href="#">Scarvest</a></li>
                                                <li><a href="#">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                     @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div><!--categori  -->

                <!-- menu -->
                <div class="block-nav-menu">
                    <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>close</span></span>
                    </div>

                    <ul class="ui-menu">
                        <li class="parent parent-megamenu active">
                            <a>Home</a>
                        </li>
                        @php
                            $categories = DB::table('categories')->get();
                        @endphp
                        @foreach ($categories as $category)
                            <li class="parent parent-submenu">
                                <a> {{ $category->category_name }} </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu drop-menu">
                                    @php
                                        $subcategories = DB::table('subcategories')
                                            ->where('category_id', $category->id)
                                            ->get();
                                    @endphp
                                    <ul>
                                        @foreach ($subcategories as $subcategory)
                                            <li><a href="#">{{ $subcategory->subcategory_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                </div><!-- menu -->

                <!-- mini cart -->
                <div class="block-minicart dropdown ">

                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="cart-icon"></span>
                    </a>

                    <div class="dropdown-menu">
                        <form>
                            <div class="minicart-content-wrapper">
                                <div class="subtitle">
                                    You have 6 item(s) in your cart
                                </div>
                                <div class="minicart-items-wrapper">
                                    <ol class="minicart-items">
                                        <li class="product-item">
                                            <a class="product-item-photo" href="#" title="The Name Product">
                                                <img class="product-image-photo"
                                                    src="{{ asset('public/frontend') }}/images/media/index1/minicart.jpg"
                                                    alt="The Name Product">
                                            </a>
                                            <div class="product-item-details">
                                                <strong class="product-item-name">
                                                    <a href="#">Donec Ac Tempus</a>
                                                </strong>
                                                <div class="product-item-price">
                                                    <span class="price">61,19 €</span>
                                                </div>
                                                <div class="product-item-qty">
                                                    <span class="label">Qty: </span><span class="number">1</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="action delete" href="#" title="Remove item">
                                                        <span>Remove</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-item">
                                            <a class="product-item-photo" href="#" title="The Name Product">
                                                <img class="product-image-photo"
                                                    src="{{ asset('public/frontend') }}/images/media/index1/minicart2.jpg"
                                                    alt="The Name Product">
                                            </a>
                                            <div class="product-item-details">
                                                <strong class="product-item-name">
                                                    <a href="#">Donec Ac Tempus</a>
                                                </strong>
                                                <div class="product-item-price">
                                                    <span class="price">61,19 €</span>
                                                </div>
                                                <div class="product-item-qty">
                                                    <span class="label">Qty: </span><span class="number">1</span>
                                                </div>
                                                <div class="product-item-actions">
                                                    <a class="action delete" href="#" title="Remove item">
                                                        <span>Remove</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div class="subtotal">
                                    <span class="label">Total</span>
                                    <span class="price">$630</span>
                                </div>
                                <div class="actions">
                                    <!-- <a class="btn btn-viewcart" href="">
                                        <span>Shopping bag</span>
                                    </a> -->
                                    <button class="btn btn-checkout" type="button" title="Check Out">
                                        <span>Checkout</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <!-- search -->
                <div class="block-search">
                    <div class="block-title">
                        <span>Search</span>
                    </div>
                    <div class="block-content">
                        <div class="form-search">
                            <form>
                                <div class="box-group">
                                    <input type="text" class="form-control" placeholder="i'm Searching for...">
                                    <button class="btn btn-search" type="button"><span>search</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- search -->

                <!--setting  -->
                <div class="dropdown setting">
                    <a data-toggle="dropdown" role="button" href="#"
                        class="dropdown-toggle "><span>Settings</span> <i aria-hidden="true"
                            class="fa fa-user"></i></a>
                    <div class="dropdown-menu  ">
                        <ul class="account">
                            <li><a href="{{ route('home') }}">My Account</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Compare</a></li>
                            @if (Auth::user())
                            <li><a href="{{ route('customer.logout') }}">LogOut</a></li>
                            @else
                            <li><a href="#">Login/Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div><!--setting  -->

            </div>
        </div>
    </div><!-- header-nav -->

</header>
