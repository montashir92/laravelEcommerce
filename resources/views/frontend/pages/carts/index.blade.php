@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Shopping Cart
@endsection


<section>   <!-- Main Content Start Here-->
    <div class="container mt-4">

        <div class="cart_product">

            <h3 class="shadow-sm p-3 mb-5 bg-white rounded">My Cart Items</h3>
            <div class="cart_table">
                @if(App\Models\Cart::totalItems() > 0)
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $total_price = 0;
                        @endphp
                        
                        @foreach(App\Models\Cart::totalCarts() as $cart)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><img src="{{ asset('images/products/'.$cart->product->images->first()->image) }}" alt="" width="50" height="80"></td>
                            <td>{{ $cart->product->name }}</td>
                            <td>
                                <form class="form-inline" action="{{ route('cart.update', $cart->id) }}" method="post">
                                    @csrf
                                    
                                    <input type="number" name="product_quantity" style="width: 100px;" class="form-control" value="{{ $cart->product_quantity }}">

                                    <button type="submit" class="btn btn-success ml-1">Update</button>

                                </form>
                            </td>
                            <td>TK.{{ number_format($cart->product->price, 2) }}</td>
                            <td>TK.{{ number_format($cart->product->price * $cart->product_quantity, 2) }}</td>
                            <td>
                                <a href="{{ route('cart.delete', $cart->id) }}" onclick="return confirm('Are You Sure to Delete?')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                            </td>
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

            <a href="{{ route('products') }}" class="btn btn-info">Continue Shopping</a>
            @if(@Auth::user()->id != NULL)
                <a href="{{ route('customer.checkout') }}" class="btn btn-warning float-right">Checkout</a>
            @else
                <a href="{{ route('customer.login') }}" class="btn btn-warning float-right">Checkout</a>
            @endif
            
            @else
            <div class="alert alert-warning">
                <strong>There is no Item Added in this Cart !!</strong>
            </div>
            
            <a href="{{ route('products') }}" class="btn btn-info">Continue Shopping</a>
            @endif
        </div>


    </div>

</section>  <!-- Main Content End Here-->

@endsection