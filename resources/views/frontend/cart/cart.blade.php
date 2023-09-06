@extends('frontend.master')
@section('body_content')

    <body class="index-opt-1 catalog-product-view catalog-view_op1 page-order">

        <div class="wrapper">



            <!-- HEADER -->
            @include('frontend.includes.header')
            <!-- end HEADER -->

            <!-- MAIN -->
            <main class="site-main">

                <div class="columns container">
                    <!-- Block  Breadcrumb-->

                    <ol class="breadcrumb no-hide">
                        <li><a href="{{ route('/') }}">Home </a></li>
                        <li class="active">Your shopping cart</li>
                    </ol><!-- Block  Breadcrumb-->

                    <h2 class="page-heading">
                        <span class="page-heading-title2">Shopping Cart Summary</span>
                    </h2>

                    <div class="page-content page-order">
                        <div class="heading-counter warning">Your shopping cart contains:
                            <span class="badge badge-success">{{ App\Models\Cart::where('customer_id', Auth::user()->id)->count() }} Product</span>
                        </div>
                        <div class="order-detail-content">
                            <div class="table-responsive">
                                <table class="table table-bordered  cart_summary">
                                    <thead>
                                        <tr>
                                            <th class="cart_product">Product</th>
                                            <th>Description</th>
                                            <th>Avail.</th>
                                            <th>Unit price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th class="action"><i class="fa fa-trash-o"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="cart_product">
                                                        <a href="#"><img alt="Product"
                                                                src="{{ asset('public/files/product/preview') }}/{{ $cart->rel_to_product->preview }}"></a>
                                                    </td>
                                                    <td class="cart_description">
                                                        <p class="product-name"><a
                                                                href="#">{{ $cart->rel_to_product->product_name }}
                                                            </a>
                                                        </p>
                                                        <small class="cart_ref">SKU :
                                                            {{ $cart->rel_to_product->sku }}</small><br>
                                                        <small><a>Color :
                                                                {{ $cart->rel_to_cartcolor->color_name }}</a></small><br>
                                                        <small><a>Size :
                                                                {{ $cart->rel_to_size->rel_to_size->size_name }}</a></small>
                                                    </td>
                                                    <td class="cart_avail"><span class="label label-success">In stock</span>
                                                    </td>
                                                    <td class="price">
                                                        <span>{{ $cart->rel_to_product->after_discount_price }} X
                                                            {{ $cart->quantity }}</span>
                                                    </td>
                                                    <td class="qty cartabc">
                                                        <div class="quantity_input">
                                                            <input class="quanty" type="text" minlength="1"
                                                                maxlength="12" name="qty0[{{ $cart->id }}]"
                                                                id="qty0[{{ $cart->id }}]"
                                                                value="{{ $cart->quantity }}" class="input-sm">
                                                            <span onclick="handleClickPlusBtn(this)"
                                                                data-field="qty0[{{ $cart->id }}]" data-type="plus"
                                                                class="btn-number"><i
                                                                    class="fa fa-caret-up"></i></span><span
                                                                onclick="handleClickMinusBtn(this)"
                                                                data-field="qty0[{{ $cart->id }}]" data-type="minus"
                                                                class="btn-number"><i class="fa fa-caret-down"></i></span>
                                                        </div>
                                                    </td>
                                                    <td class="price">
                                                        <span id=""><span
                                                                class="totalprice">{{ $cart->rel_to_product->after_discount_price * $cart->quantity }}</span>
                                                            &#2547; &nbsp;</span>
                                                    </td>
                                                    <td class="action">
                                                        <a href="{{ route('cart.delete', ['id' => $cart->id]) }}">Delete
                                                            item</a>
                                                    </td>
                                                </tr>

                                                @php
                                                    $total += $cart->rel_to_product->after_discount_price * $cart->quantity;
                                                @endphp
                                        @endforeach
                                        <td class="text-center">
                                            <input class="btn btn-warning" type="submit" value="Update Cart">
                                        </td>
                                        </form>
                                    </tbody>
                                    @if ($message)
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @endif
                                    <tfoot style="background-color: #636161; color: white">
                                        <tr>
                                            <td rowspan="2" colspan="2">
                                                <form action="{{ route('cart') }}">
                                                    <div class="col-lg-8">
                                                        <input
                                                            style="color: blueviolet; border-radius: 10px; font-size: 17px;"
                                                            class="form-control" type="text" name="coupon"
                                                            id="" placeholder="Coupon Code">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input class=" btn btn-warning" style="color: white" type="submit"
                                                            value="Add Coupon">
                                                    </div>
                                                </form>
                                            </td>
                                            <td colspan="3">Subtotal</td>
                                            <td colspan="2">{{ $total }} &#2547; &nbsp;</td>
                                        </tr>
                                        <tr>
                                            @php
                                                if ($type == 1) {
                                                    $discount_price = $total*$amount/100;
                                                }
                                                else {
                                                    $discount_price = $amount;
                                                }
                                            @endphp
                                            <td colspan="3"><strong>Discount</strong></td>
                                            <td style="background-color: white; color: black "  colspan="2"><strong
                                                    class="text-danger">{{ $discount_price }} &#2547; &nbsp;</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><strong>Total</strong></td>
                                            <td colspan="2"><strong>{{ $total -$discount_price }} &#2547; &nbsp;</strong></td>
                                        </tr>
                                        @php
                                            session([
                                                'total_price_after_discount' => $total -$discount_price,
                                                'subtotal'=> $total,
                                    ]);
                                        @endphp
                                    </tfoot>
                                </table>
                            </div>
                            <div class="cart_navigation">
                                {{-- <a href="#" class="prev-btn">Continue shopping</a> --}}
                                <a href="{{ route('checkout') }}" class="next-btn">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                    <br>
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




        <!-- jQuery -->
        @include('frontend.includes.js')
        {{-- <script>
            var td = document.getElementsByClassName('cartabc');
            var array = Array.from(td);
            array.map((item) => {
                console.log(item);
            })
        </script> --}}
        <script>
            function handleClickPlusBtn(target) {
                var plusvalue = parseInt(target.parentNode.childNodes[1].value) + 1;
                if (plusvalue > '12') {
                    var plusvalue = parseInt('12');
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                } else {
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                }
            }

            function handleClickMinusBtn(target) {
                var plusvalue = parseInt(target.parentNode.childNodes[1].value) - 1;
                if (plusvalue < '1') {
                    plusvalue = parseInt('1');
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                } else {
                    var price = parseInt(target.parentNode.parentNode.parentNode.childNodes[7].innerText.split(' ')[0]);
                    var total = target.parentNode.parentNode.parentNode.childNodes[11].innerText;
                    var subtotal = price * plusvalue;
                    target.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].childNodes[0].innerText = subtotal;
                }
                //    console.log(plusvalue);
            }
        </script>
    </body>
@endsection
