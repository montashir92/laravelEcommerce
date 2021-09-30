<html>
    <head>
        <title>Invoice - {{ $order->id }}</title>

        <link rel="stylesheet" href="{{asset('backend/css/admin_style.css')}}">
        <style>
            .content-wrapper{
                background: #FFF;
            }
            .invoice-header {
                background: #f7f7f7;
                padding: 10px 20px 10px 20px;
                border-bottom: 1px solid gray;
            }
            .invoice-right-top h3 {
                padding-right: 20px;
                margin-top: 20px;
                color: #ec5d01;
                font-size: 55px!important;
                font-family: serif;
            }
            .invoice-left-top {
                border-left: 4px solid #ec5d00;
                padding-left: 20px;
                padding-top: 20px;
            }
            thead {
                background: #ec5d01;
                color: #FFF;
            }

            .authority h5 {
                margin-top: -10px;
                color: #ec5d01;
                /*text-align: center;*/
            }
            .thanks h4 {
                color: #ec5d01;
                font-size: 25px;
                font-weight: normal;
                font-family: serif;
                margin-top: 20px;
            }
            .site-address p {
                line-height: 6px;
                font-weight: 300;
            }
        </style>
    </head>
    <body>

        <div class="content-wrapper">

            <div class="invoice-header">
                <div class="float-left site-logo">
                    <img src="{{ asset('images/default/blogo.png') }}" height="80" alt="">
                </div>
                <div class="float-right site-address">
                    <h4>E-Bazaar</h4>
                    <p>31/1, Purana Paltan, Dhaka-1200</p>
                    <p>Phone: <a href="">01951233084</a></p>
                    <p>Email: <a href="mailto:info@laraecommerce.com">info@laraecommerce.com</a></p>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="invoice-description">
                <div class="invoice-left-top float-left">
                    <h6>Invoice to</h6>
                    <h3>{{ $order->name }}</h3>
                    <div class="address">
                        <p>
                            <strong>Address: </strong>
                            {{ $order->shipping_address }}
                        </p>
                        <p>Phone: {{ $order->mobile }}</p>
                        <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
                    </div>
                </div>
                <div class="invoice-right-top float-right">
                    <h3>Invoice #{{ $order->id }}</h3>
                    <p>
                        <?php echo date('j F, Y', strtotime($order->created_at)); ?>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="">

                <h3>Products</h3>

                @if ($order->carts->count() > 0)
                <table class="table table-bordered table-stripe">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Sub total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_price = 0;
                        @endphp
                        @foreach ($order->carts as $cart)
                        <tr>
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td>
                               {{ $cart->product->name }}
                            </td>
                            <td>
                                {{ $cart->product_quantity }}
                            </td>
                            <td>
                                TK. {{ $cart->product->price }}
                            </td>
                            <td>
                                @php
                                $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp

                                TK. <?php echo number_format($cart->product->price * $cart->product_quantity, 2); ?>
                            </td>

                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td>
                                Discount:
                            </td>
                            <td colspan="2">
                                <strong> TK. <?php echo number_format($order->customer_discount, 2); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>
                                Shipping Cost:
                            </td>
                            <td colspan="2">
                                <strong> TK. <?php echo number_format($order->shipping_charge, 2); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>
                                Total Amount:
                            </td>
                            <td colspan="2">
                                <strong> TK. <?php echo number_format($total_price + $order->shipping_change - $order->customer_discount, 2); ?></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif

                <div class="thanks mt-3">
                    <h4>Thank you for your business !!</h4>
                </div>

                <div class="authority float-right mt-5">
                    <p>-----------------------------------</p>
                    <h5>Authority Signature:</h5>
                </div>
                <div class="clearfix"></div>

            </div>

    </body>
</html>