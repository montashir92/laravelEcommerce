@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - My Order
@endsection

<style>
    .proft li{
        background: #1781BF;
        padding: 7px;
        margin: 3px;
        border-radius: 6px;
    }

    .proft li a{
        color: #fff;
        padding-left: 15px;
    }

    .img-circle img{
        text-align: center;
        width: 150px;
        height: 150px;
        border: 1px solid #444;
        border-radius: 50%;
        padding: 2px;
        margin-bottom: 10px;
    }
</style>


<section class="slider mt-4">   <!-- Slider Start Here-->
    <div class="container">

        <div class="product-slider">
            <h3 class="text-center">My Order</h3>
        </div>
    </div>

</section> <!-- Slider End Here-->


<div class="container mt-4 mb-4">

    <div class="row">
        <div class="col-md-3">
            <ul class="proft">
                <li><a href="{{ route('customer.dashboard') }}">My Profile</a></li>
                <li><a href="{{ route('customer.change.password') }}">Password Change</a></li>
                <li><a href="{{ route('customer.order.list') }}">My Order</a></li>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-1">

                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Product Title</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_price = 0;
                                @endphp

                                @foreach($order->carts as $cart)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        @if($cart->product->images->count() > 0)
                                        <img src="{{ asset('images/products/'.$cart->product->images->first()->image) }}" alt="" width="50" height="80">
                                        @endif
                                    </td>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>{{ $cart->product_quantity }}</td>
                                    <td>TK.{{ number_format($cart->product->price, 2) }}</td>
                                    <td>TK.{{ number_format($cart->product->price * $cart->product_quantity, 2) }}</td>
                                </tr>

                                @php
                                    $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp
                                @endforeach

                                <tr>
                                    <td colspan="5" class="text-right"><strong>Total Amount =</strong></td>
                                    <td colspan="2"><strong>TK. {{ number_format($total_price, 2) }}</strong></td>
                                </tr>
                                
                            </tbody>
                            
                        </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


@endsection

@section('scripts')

@endsection
