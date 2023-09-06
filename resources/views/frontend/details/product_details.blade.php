@extends('frontend.master')
@section('body_content')

    <body class="index-opt-1 catalog-product-view catalog-view_op1">

        <div class="wrapper">



            <!-- HEADER -->
            @include('frontend.includes.header')
            <!-- end HEADER -->

            <!-- MAIN -->
            <main class="site-main">

                <div class="columns container">
                    <!-- Block  Breadcrumb-->

                    <ol class="breadcrumb no-hide">
                        <li><a href="#">Home </a></li>
                        <li><a href="#">Electronics </a></li>
                        <li class="active">Machine Pro</li>
                    </ol><!-- Block  Breadcrumb-->

                    <div class="row">



                        <!-- Main Content -->
                        <div class="col-md-9 col-md-push-3  col-main">

                            <div class="row">

                                <div class="col-sm-6 col-md-6 col-lg-6">

                                    <div class="product-media media-horizontal">

                                        <div class="image_preview_container images-large">

                                            <img id="img_zoom"
                                                data-zoom-image="{{ asset('public/files/product/preview') }}/{{ $product_details->preview }}"
                                                src="{{ asset('public/files/product/preview') }}/{{ $product_details->preview }}"
                                                alt="">

                                            <button class="btn-zoom open_qv"><span>zoom</span></button>

                                        </div>

                                        <div class="product_preview images-small">

                                            <div class="owl-carousel thumbnails_carousel" id="thumbnails" data-nav="true"
                                                data-dots="false" data-margin="10"
                                                data-responsive='{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'>
                                                @foreach ($thumbnails as $thumbnail)
                                                    <a href="#"
                                                        data-image="{{ asset('public/files/product/thumbnail') }}/{{ $thumbnail->thumbnail }}"
                                                        data-zoom-image="{{ asset('public/files/product/thumbnail') }}/{{ $thumbnail->thumbnail }}">

                                                        <img src="{{ asset('public/files/product/thumbnail') }}/{{ $thumbnail->thumbnail }}"
                                                            data-large-image="{{ asset('public/files/product/thumbnail') }}/{{ $thumbnail->thumbnail }}"
                                                            alt="">

                                                    </a>
                                                @endforeach



                                            </div><!--/ .owl-carousel-->

                                        </div><!--/ .product_preview-->

                                    </div><!-- image product -->
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6">

                                    <div class="product-info-main">

                                        <h1 class="page-title">
                                            {{ $product_details->product_name }}
                                        </h1>
                                        <div class="product-reviews-summary">
                                            <div class="rating-summary">
                                                <div class="rating-result" title="70%">
                                                    <span style="width:70%">
                                                        <span><span>70</span>% of <span>100</span></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="reviews-actions">
                                                <a href="#" class="action view">Based on 3 ratings</a>
                                                <a href="#" class="action add"><img alt="img"
                                                        src="{{ asset('public/frontend') }}/images/icon/write.png">&#160;&#160;write
                                                    a review</a>
                                            </div>
                                        </div>

                                        <div class="product-info-price">
                                            <div class="price-box">
                                                <span class="price">&#2547; {{ $product_details->after_discount_price }}
                                                </span>
                                                <span class="old-price">&#2547; {{ $product_details->price }}</span>
                                                <span class="label-sale">-{{ $product_details->discount_price }}%</span>
                                            </div>
                                        </div>
                                        <div class="product-code">
                                            Item Code: {{ $product_details->sku }} :
                                        </div>
                                        <div class="product-info-stock">
                                            <div class="stock available">
                                                <span class="label">Availability: </span>
                                                @if (session('stockout'))
                                                    <div class="alert alert-danger">
                                                        Stock Out <strong>{{ session('stockout') }}</strong> product available
                                                    </div>
                                                @else
                                                In Stock
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-condition">
                                            Condition: New
                                        </div>
                                        <div class="product-overview">
                                            <div class="overview-content">
                                                {{ $product_details->short_description }}
                                            </div>
                                        </div>

                                        <div class="product-add-form">
                                            <p>Available Options:</p>
                                            <form action="{{ route('add.to.card') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product_details->id }}">
                                                <div class="product-options-wrapper">

                                                    <div class="swatch-opt">
                                                        <div class="swatch-attribute color">
                                                            <span class="swatch-attribute-label">Color:</span>
                                                            <div class="swatch-attribute-options clearfix">
                                                                <!-- Latest compiled and minified CSS -->
                                                                <div class="custom-radio-button">
                                                                    @foreach($colors as $color)
                                                                    <div>
                                                                      <input title="{{ $color->rel_to_color->color_name }}" type="radio" id="color-red{{ $color->rel_to_color->color_code }}" name="color_id" value="{{ $color->color_id }}">
                                                                      <label for="color-red{{ $color->rel_to_color->color_code }}">
                                                                        <span style="background-color: {{ $color->rel_to_color->color_code }}" >
                                                                        </span>
                                                                      </label>
                                                                    </div>
                                                                    
                                                                    @endforeach
                                                                </div>
                                                                
                                                                
                                                            {{-- <div class="swatch-option color" style="background-color: #036c5d ;"></div>
                                                            <div class="swatch-option color" style="background-color: #5f2363 ;"></div>
                                                            <div class="swatch-option color " style="background-color: #ffc000 ;"></div>
                                                            <div class="swatch-option color" style="background-color: #36a93c ;"></div> --}}
                                                                {{-- @foreach ($colors as $color)
                                                                <div class="swatch-option color text-center" style="background-color: {{ $color->rel_to_color->color_code }} ;"><input title="{{ $color->rel_to_color->color_name }}"
                                                                    style="background-color: {{ $color->rel_to_color->color_code }};"
                                                                    class="color_id swatch-option color selected"
                                                                    id="color{{ $color->color_id }}" type="radio"
                                                                    name="color_id" value="{{ $color->color_id }}">
                                                                <label for="color{{ $color->color_id }}"
                                                                    style="background-color: {{ $color->rel_to_color->color_code }}"></label></div>
                                                                @endforeach --}}
                                                                {{-- @foreach ($colors as $color)
                                                            <div class="swatch-option color" style="background-color: {{ $color->rel_to_color->color_code }};"></div>
                                                            @endforeach --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-qty mt-8">
                                                        <label class="label">Qty: </label>
                                                        <div class="control">
                                                            <input type="text" class="form-control input-qty"
                                                                value='1' id="qty1" name="qty1" maxlength="12"
                                                                minlength="1">
                                                            <button class="btn-number  qtyminus" data-type="minus"
                                                                data-field="qty1"><span>-</span></button>
                                                            <button class="btn-number  qtyplus" data-type="plus"
                                                                data-field="qty1"><span>+</span></button>
                                                        </div>
                                                    </div>
                                                    <div class="form-configurable">
                                                        <label for="forSize" class="label">Size: </label>
                                                        <div class="control">
                                                            <select id="forSize" class="form-control attribute-select"
                                                                name="size_id">
                                                                @foreach ($sizes as $size)
                                                                    <option value="{{ $size->size_id }}">
                                                                        {{ $size->rel_to_size->size_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- <a href="#" class="size-chart">Size chart</a> --}}
                                                    </div>
                                                </div>
                                                <div class="product-options-bottom clearfix">
                                                    <div class="actions">
                                                        @if (Auth::user())
                                                            <button type="submit" title="Add to Cart"
                                                                class="action btn-cart">
                                                                <span>Add to Cart</span>
                                                            </button>
                                                        @else
                                                            <button type="submit" title="Add to Cart"
                                                                class="action btn-cart">
                                                                <span><a href="{{ route('customer.login') }}">Add to
                                                                        Cart</a></span>
                                                            </button>
                                                        @endif
                                                        <div class="product-addto-links">
                                                            <a href="#" class="action btn-wishlist"
                                                                title="Wish List">
                                                                <span>Wishlist</span>
                                                            </a>
                                                            <a href="#" class="action btn-compare" title="Compare">
                                                                <span>Compare</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="product-addto-links-second">
                                            <a href="#" class="action action-print">Print</a>
                                            <a href="#" class="action action-friend">Send to a friend</a>
                                        </div>
                                        <div class="share">
                                            <img src="{{ asset('public/frontend') }}/images/media/index1/share.png"
                                                alt="share">
                                        </div>
                                    </div><!-- detail- product -->

                                </div><!-- Main detail -->

                            </div>

                            <!-- product tab info -->

                            <div class="product-info-detailed ">

                                <!-- Nav tabs -->
                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" role="tab"
                                            data-toggle="tab">Product Details </a></li>
                                    <li role="presentation"><a href="#tags" role="tab"
                                            data-toggle="tab">information </a></li>
                                    <li role="presentation"><a href="#reviews" role="tab"
                                            data-toggle="tab">reviews</a></li>
                                    <li role="presentation"><a href="#additional" role="tab" data-toggle="tab">Extra
                                            Tabs</a></li>
                                    <li role="presentation"><a href="#tab-cust" role="tab"
                                            data-toggle="tab">Guarantees</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <div class="block-title">Product Details</div>
                                        <div class="block-content">
                                            <p>{!! $product_details->long_description !!}</p>

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tags">
                                        <div class="block-title">information</div>
                                        <div class="block-content">
                                            <p>{!! $product_details->additional_information !!}</p>


                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                        <div class="block-title">reviews</div>
                                        <div class="block-content">

                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book. It has survived not only five centuries, but also
                                                the leap into electronic typesetting, remaining essentially unchanged. It
                                                was popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="additional">
                                        <div class="block-title">Extra Tabs</div>
                                        <div class="block-content">

                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book. It has survived not only five centuries, but also
                                                the leap into electronic typesetting, remaining essentially unchanged. It
                                                was popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book. It has survived not only five centuries, but also
                                                the leap into electronic typesetting, remaining essentially unchanged. It
                                                was popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab-cust">
                                        <div class="block-title">Guarantees</div>
                                        <div class="block-content">

                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book. It has survived not only five centuries, but also
                                                the leap into electronic typesetting, remaining essentially unchanged. It
                                                was popularised in the 1960s with the release of Letraset sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus PageMaker including versions of Lorem Ipsum</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book. It has survived not only five centuries, but also
                                                Aldus PageMaker including versions of Lorem Ipsum</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product tab info -->
                            <!-- block-related product -->
                            <div class="block-related ">
                                <div class="block-title">
                                    <strong class="title">RELATED products</strong>
                                </div>
                                <div class="block-content ">
                                    <ol class="product-items owl-carousel " data-nav="true" data-dots="false"
                                        data-margin="30"
                                        data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3}}'>
                                        @forelse ($related_products as $related_product)
                                            <li class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a href="{{ route('product.details', ['slug' => $related_product->slug]) }}"
                                                            class="product-item-img"><img
                                                                src="{{ asset('public/files/product/preview') }}/{{ $related_product->preview }}"
                                                                alt="product name"></a>
                                                        <div class="product-item-actions">
                                                            <a href="#"
                                                                class="btn btn-wishlist"><span>wishlist</span></a>
                                                            <a href="#"
                                                                class="btn btn-compare"><span>compare</span></a>
                                                            <a href="#"
                                                                class="btn btn-quickview"><span>quickview</span></a>
                                                        </div>
                                                        <button class="btn btn-cart" type="button"><span>Add to
                                                                Cart</span></button>

                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a
                                                                href="#">{{ $related_product->product_name }}</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="70%">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of
                                                                                <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <p>No related product ...</p>
                                        @endforelse


                                    </ol>
                                </div>
                            </div><!-- block-related product -->

                            <!-- block-Upsell Products -->
                            <div class="block-upsell ">
                                <div class="block-title">
                                    <strong class="title">You might also like</strong>
                                </div>
                                <div class="block-content ">
                                    <ol class="product-items owl-carousel " data-nav="true" data-dots="false"
                                        data-margin="30"
                                        data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3}}'>


                                        <li class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a href="#" class="product-item-img"><img
                                                            src="{{ asset('public/frontend') }}/images/media/detail/Upsell2-1.jpg"
                                                            alt="product name"></a>
                                                    <div class="product-item-actions">
                                                        <a href="#"
                                                            class="btn btn-wishlist"><span>wishlist</span></a>
                                                        <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                        <a href="#"
                                                            class="btn btn-quickview"><span>quickview</span></a>
                                                    </div>
                                                    <button class="btn btn-cart" type="button"><span>Add to
                                                            Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="#">Leather Swiss
                                                            Watch</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="70%">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a href="#" class="product-item-img"><img
                                                            src="{{ asset('public/frontend') }}/images/media/detail/Upsell2-2.jpg"
                                                            alt="product name"></a>
                                                    <div class="product-item-actions">
                                                        <a href="#"
                                                            class="btn btn-wishlist"><span>wishlist</span></a>
                                                        <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                        <a href="#"
                                                            class="btn btn-quickview"><span>quickview</span></a>
                                                    </div>
                                                    <button class="btn btn-cart" type="button"><span>Add to
                                                            Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="#">Sport T-Shirt For
                                                            Men</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="70%">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a href="#" class="product-item-img"><img
                                                            src="{{ asset('public/frontend') }}/images/media/detail/Upsell2-3.jpg"
                                                            alt="product name"></a>
                                                    <div class="product-item-actions">
                                                        <a href="#"
                                                            class="btn btn-wishlist"><span>wishlist</span></a>
                                                        <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                        <a href="#"
                                                            class="btn btn-quickview"><span>quickview</span></a>
                                                    </div>
                                                    <button class="btn btn-cart" type="button"><span>Add to
                                                            Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="#">Fashion Leather
                                                            Handbag</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="70%">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a href="#" class="product-item-img"><img
                                                            src="{{ asset('public/frontend') }}/images/media/detail/Upsell2-3.jpg"
                                                            alt="product name"></a>
                                                    <div class="product-item-actions">
                                                        <a href="#"
                                                            class="btn btn-wishlist"><span>wishlist</span></a>
                                                        <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                        <a href="#"
                                                            class="btn btn-quickview"><span>quickview</span></a>
                                                    </div>
                                                    <button class="btn btn-cart" type="button"><span>Add to
                                                            Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="#">Fashion Leather
                                                            Handbag</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="70%">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ol>
                                </div>
                            </div><!-- block-Upsell Products -->

                        </div><!-- Main Content -->

                        <!-- Sidebar -->
                        <div class=" col-md-3 col-md-pull-9   col-sidebar">

                            <!-- Block  bestseller products-->
                            <div class="block-sidebar block-sidebar-categorie">
                                <div class="block-title">
                                    <strong>PRODUCT TYPES</strong>
                                </div>
                                <div class="block-content">
                                    <ul class="items">
                                        <li class="parent">
                                            <a href="#">Dress</a>
                                            <span class="toggle-submenu"></span>
                                            <ul class="subcategory">
                                                <li>
                                                    <a href="#">subcategory 1</a>

                                                </li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Bags</a>
                                        </li>
                                        <li class="parent">
                                            <a href="#">Cost &amp; Jackets</a>
                                            <span class="toggle-submenu"></span>
                                            <ul class="subcategory">
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent">
                                            <a href="#">Beauty</a>
                                            <span class="toggle-submenu"></span>
                                            <ul class="subcategory">
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent">
                                            <a href="#">Jewellery</a>
                                            <span class="toggle-submenu"></span>
                                            <ul class="subcategory">
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent">
                                            <a href="#">Nightwear</a>
                                            <span class="toggle-submenu"></span>
                                            <ul class="subcategory">
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                            </ul>
                                        </li>
                                        <li class="parent">
                                            <a href="#">Jumpers &amp; Cardigans</a>
                                            <span class="toggle-submenu"></span>
                                            <ul class="subcategory">
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                                <li><a href="#">subcategory 1</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- Block  bestseller products-->

                            <!-- Block  bestseller products-->
                            <div class="block-sidebar block-sidebar-products">
                                <div class="block-title">
                                    <strong>BEST SALES</strong>
                                </div>
                                <div class="block-content">
                                    <div class="owl-carousel" data-nav="false" data-dots="true" data-margin="0"
                                        data-autoplayTimeout="700" data-autoplay="true" data-loop="true"
                                        data-responsive='{
                                "0":{"items":1},
                                "420":{"items":1},
                                "480":{"items":2},
                                "600":{"items":2},
                                "992":{"items":1}
                                }'>
                                        <div class="item">
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href="#"><img
                                                                alt="product name"
                                                                src="{{ asset('public/frontend') }}/images/media/detail/best1.jpg"></a>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="#">Man’s Within
                                                                Plus Size Flared</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="70%" class="rating-result">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of
                                                                                <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href="#"><img
                                                                alt="product name"
                                                                src="{{ asset('public/frontend') }}/images/media/detail/best2.jpg"></a>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="#">Woman Within
                                                                Plus Size Flared</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="70%" class="rating-result">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of
                                                                                <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href="#"><img
                                                                alt="product name"
                                                                src="{{ asset('public/frontend') }}/images/media/detail/best3.jpg"></a>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="#">Plus Size Rock
                                                                Star Skirt</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="70%" class="rating-result">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of
                                                                                <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href="#"><img
                                                                alt="product name"
                                                                src="{{ asset('public/frontend') }}/images/media/detail/best1.jpg"></a>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="#">Man’s Within
                                                                Plus Size Flared</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="70%" class="rating-result">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of
                                                                                <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href="#"><img
                                                                alt="product name"
                                                                src="{{ asset('public/frontend') }}/images/media/detail/best2.jpg"></a>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="#">Woman Within
                                                                Plus Size Flared</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="70%" class="rating-result">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of
                                                                                <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href="#"><img
                                                                alt="product name"
                                                                src="{{ asset('public/frontend') }}/images/media/detail/best3.jpg"></a>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="#">Plus Size Rock
                                                                Star Skirt</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="70%" class="rating-result">
                                                                        <span style="width:70%">
                                                                            <span><span>70</span>% of
                                                                                <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Block  bestseller products-->

                            <!-- block slide top -->
                            <div class="block-sidebar block-banner-sidebar">
                                <div class="owl-carousel" data-nav="false" data-dots="true" data-margin="0"
                                    data-items='1' data-autoplayTimeout="700" data-autoplay="true" data-loop="true">
                                    <div class="item item1">
                                        <img src="{{ asset('public/frontend') }}/images/media/detail/banner-slide2.jpg"
                                            alt="images">
                                    </div>
                                    <div class="item item2">
                                        <img src="{{ asset('public/frontend') }}/images/media/detail/banner-slide2.jpg"
                                            alt="images">
                                    </div>
                                    <div class="item item3">
                                        <img src="{{ asset('public/frontend') }}/images/media/detail/banner-slide2.jpg"
                                            alt="images">
                                    </div>
                                </div>
                            </div><!-- block slide top -->

                            <!-- Block  SALE products-->
                            <div class="block-sidebar block-sidebar-products-opt2">
                                <div class="block-title">
                                    <strong>SALE PRODUCTS</strong>
                                </div>
                                <div class="block-content">
                                    <div class="owl-carousel" data-nav="false" data-dots="true" data-margin="0"
                                        data-autoplayTimeout="700" data-autoplay="true" data-loop="true"
                                        data-responsive='{
                                "0":{"items":1},
                                "420":{"items":2},
                                "480":{"items":2},
                                "600":{"items":2},
                                "992":{"items":1}
                                }'>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a href="#" class="product-item-img"><img
                                                            src="{{ asset('public/frontend') }}/images/media/detail/sale1.jpg"
                                                            alt="product name"></a>
                                                    <div class="product-item-actions">
                                                        <a href="#"
                                                            class="btn btn-wishlist"><span>wishlist</span></a>
                                                        <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                        <a href="#"
                                                            class="btn btn-quickview"><span>quickview</span></a>
                                                    </div>
                                                    <button class="btn btn-cart" type="button"><span>Add to
                                                            Cart</span></button>
                                                    <span class="product-item-label label-price">30%
                                                        <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="#">Luxury Dark Blue
                                                            Coast</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="70%">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a href="#" class="product-item-img"><img
                                                            src="{{ asset('public/frontend') }}/images/media/product1.jpg"
                                                            alt="product name"></a>
                                                    <div class="product-item-actions">
                                                        <a href="#"
                                                            class="btn btn-wishlist"><span>wishlist</span></a>
                                                        <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                        <a href="#"
                                                            class="btn btn-quickview"><span>quickview</span></a>
                                                    </div>
                                                    <button class="btn btn-cart" type="button"><span>Add to
                                                            Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="#">Asus Ispiron
                                                            20</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="70%">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a href="#" class="product-item-img"><img
                                                            src="{{ asset('public/frontend') }}/images/media/product1.jpg"
                                                            alt="product name"></a>
                                                    <div class="product-item-actions">
                                                        <a href="#"
                                                            class="btn btn-wishlist"><span>wishlist</span></a>
                                                        <a href="#" class="btn btn-compare"><span>compare</span></a>
                                                        <a href="#"
                                                            class="btn btn-quickview"><span>quickview</span></a>
                                                    </div>
                                                    <button class="btn btn-cart" type="button"><span>Add to
                                                            Cart</span></button>
                                                    <span class="product-item-label label-price">30%
                                                        <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="#">Asus Ispiron
                                                            20</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="70%">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Block  SALE products-->

                            <!-- block slide top -->
                            <div class="block-sidebar block-sidebar-testimonials2">

                                <div class="block-content">
                                    <div class="owl-carousel" data-nav="false" data-dots="true" data-margin="0"
                                        data-items='1' data-autoplayTimeout="700" data-autoplay="true" data-loop="true">
                                        <div class="item ">
                                            <div class="img">
                                                <img src="{{ asset('public/frontend') }}/images/icon/icon1.png"
                                                    alt="icon1">
                                            </div>
                                            <strong class="title">100% Money Back Guaranteed</strong>
                                            <div class="des">
                                                Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                                tempor incididunt .
                                            </div>
                                            <a href="#" class="btn">Read more <i aria-hidden="true"
                                                    class="fa fa-angle-double-right"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- block slide top -->


                        </div><!-- Sidebar -->

                    </div>
                </div>


            </main><!-- end MAIN -->

            <!-- FOOTER -->
            @include('frontend.includes.footer')
            <!-- end FOOTER -->

            <!--back-to-top  -->
            <a href="#" class="back-to-top">
                <i aria-hidden="true" class="fa fa-angle-up"></i>
            </a>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('frontend.includes.js')

        <!-- Custom scripts -->

        <script>
            (function($) {

                "use strict";

                $(document).ready(function() {

                    /*  [ Filter by price ]

                    - - - - - - - - - - - - - - - - - - - - */

                    $('#slider-range').slider({

                        range: true,

                        min: 0,

                        max: 500,

                        values: [0, 300],

                        slide: function(event, ui) {

                            $('#amount-left').text(ui.values[0]);
                            $('#amount-right').text(ui.values[1]);

                        }

                    });

                    $('#amount-left').text($('#slider-range').slider('values', 0));

                    $('#amount-right').text($('#slider-range').slider('values', 1));
                });

            })(jQuery);
        </script>
        @if (session('cart-success'))
            {
            <script>
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: 'Cart Added',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>
            }
        @endif
    </body>
@endsection
