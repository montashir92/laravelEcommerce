@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Payment Method
@endsection


<section>   <!-- Main Content Start Here-->
    <div class="container mt-4">

        <div class="cart_product">

            <h3 class="shadow-sm p-3 mb-5 bg-white rounded">Confirm Items</h3>
            <div class="card card-body">
                <div class="cart_table">
                    <h4>Item Details</h4>
                    <hr>

                    <table class="table table-striped table-bordered">
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

                            @foreach(App\Models\Cart::totalCarts() as $cart)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ asset('images/products/'.$cart->product->images->first()->image) }}" alt="" width="50" height="80"></td>
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
                                <td colspan="5" class="text-right">Shipping Cost</td>
                                <td colspan="2">TK. {{ App\Models\Setting::first()->shipping_cost }}</td>
                            </tr>
                            
                            <tr>
                                <td colspan="5" class="text-right"><strong>Grand Total =</strong></td>
                                <td colspan="2"><strong>TK. {{ number_format($total_price + App\Models\Setting::first()->shipping_cost, 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card card-body mt-2">
                <h4><strong>Confirm shipping Address</strong></h4>

                <hr/>
                
                @if(session('message'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Success !! </strong>{{session('message')}}
                    <button type="submit" class="close" data-dismiss="alert" aria-level="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                
                <form action="{{ route('customer.checkout.store') }}" method="post" id="myForm">
                    @csrf

                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Receiver Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Mobile</label>

                        <div class="col-md-6">
                            <input id="mobile" type="text" class="form-control" name="mobile" value="{{ Auth::check() ? Auth::user()->mobile : '' }}">
                            <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Message</label>

                        <div class="col-md-6">
                            <textarea id="message" rows="4" class="form-control" name="message">
                            
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Shipping Address</label>

                        <div class="col-md-6">
                            <textarea id="shipping_address" rows="4" class="form-control" name="shipping_address">
                            {{ Auth::check() ? Auth::user()->shipping_address : '' }}
                            </textarea>
                            <font style="color: red">{{($errors->has('shipping_address'))?($errors->first('shipping_address')):''}}</font>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">Payment Method</label>

                        <div class="col-md-6">
                            <select class="form-control" name="payment_method_id" id="payments">
                                <option value="">Select Payment Method</option>
                                @foreach($payments as $payment)
                                <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                @endforeach
                            </select>
                            <font style="color: red">{{($errors->has('payment_method_id'))?($errors->first('payment_method_id')):''}}</font>
                            
                            @foreach($payments as $payment)
                                @if($payment->short_name == 'cash_in')
                                <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                                    <h4>For cash in Nothing Necessary, just click finish order</h4>
                                    <hr/>
                                    <small>You will get your Product in two or tree business days</small>
                                </div>
                                @else
                                <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                                    <h4>{{ $payment->name }} Payment</h4>
                                    
                                    <p>
                                        <strong>{{ $payment->name }} No. {{ $payment->no }}</strong>
                                        
                                        <hr/>
                                        
                                        <strong>Account Type: {{ $payment->type }}</strong>
                                    </p>
                                    
                                    <div class="alert alert-success">
                                        Pease sent the above money to this Bkash no and write your Transaction code blow there
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            
                            <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction Code">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Order Now
                            </button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>

            
        </div>


    </div>

</section>  <!-- Main Content End Here-->

@endsection

@section('scripts')
<script>
    $("#payments").change(function(){
        $payment_method = $("#payments").val();
        
        if($payment_method == 'cash_in'){
            $("#payment_cash_in").removeClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#payment_rocket").addClass('hidden');
            $("#transaction_id").addClass('hidden');
        }else if($payment_method == 'bkash'){
            $("#payment_bkash").removeClass('hidden');
            $("#payment_rocket").addClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
        }else if($payment_method == 'rocket'){
            $("#payment_rocket").removeClass('hidden');
            $("#payment_cash_in").addClass('hidden');
            $("#payment_bkash").addClass('hidden');
            $("#transaction_id").removeClass('hidden');
        }
    });
</script>

<script>
    $(function () {

        $('#myForm').validate({
            rules: {
                shipping_address: {
                    required: true
                },
                payments: {
                    required: true,
                    email: true
                }

            },

            messages: {
                

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection