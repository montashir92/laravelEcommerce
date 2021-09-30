@extends('backend.layouts.admin_master')
@section('admin_content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Order</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Order</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Ordered Items</h3>
                        <a href="{{ route('orders.index') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Order List </a>
                    </div>
                    <!-- /.card-header -->
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
                    <!-- /.card-body -->
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-info-circle"></i> Order Details Info</h3>
                        <h3 class="card-title float-right">Order No: #LE{{ $order->id }}<h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                
                            <div class="col-md-6 border-right">
                                <p><strong>Orderer Name: </strong>{{ $order->name }}</p>
                                <p><strong>Orderer Phone: </strong>{{ $order->phone_no }}</p>
                                <p><strong>Orderer Email: </strong>{{ $order->email }}</p>
                                <p><strong>Orderer Shipping Address: </strong>{{ $order->shipping_address }}</p>
                            </div>

                            <div class="col-md-6">
                                <p><strong>Order Payment Method: </strong>{{ $order->payment->name }}</p>
                                <p><strong>Order Payment Transaction: </strong>{{ $order->transaction_id }}</p>
                            </div>
                        </div>
                        
                        <hr/>
                
                        <form action="{{ route('orders.update.charge', $order->id) }}" method="post">
                            @csrf
                            <label for="">Shipping Cost: </label>
                            <input type="number" name="shipping_charge" id="shipping_charge" value="{{ $order->shipping_charge }}">
                            <br/>
                            <label for="">Custom Discount: </label>
                            <input type="number" name="customer_discount" id="customer_discount" value="{{ $order->customer_discount }}">

                            <hr/>
                            <input type="submit" value="Update" class="btn btn-success">
                            <a href="{{ route('orders.invoice', $order->id) }}" target="_blank" class="btn btn-info">Download PFD</a>
                        </form>

                        <hr/>
                        
                        <form action="{{ route('orders.complete', $order->id) }}" method="post" class="form-inline" style="display: inline-block!important;">
                            @csrf

                            @if($order->is_complete)
                            <input type="submit" value="Cancel Order" class="btn btn-danger">
                            @else
                            <input type="submit" value="Complete Order" class="btn btn-success">
                            @endif
                        </form>

                        <form action="{{ route('orders.paid', $order->id) }}" method="post" class="form-inline mt-3" style="display: inline-block!important;">
                            @csrf

                            @if($order->is_paid)
                            <input type="submit" value="Cancel Payment" class="btn btn-danger">
                            @else
                            <input type="submit" value="Complete Payment" class="btn btn-success">
                            @endif
                        </form>
                        
                    </div>
                    <!-- /.card-body -->
                    
                    
                
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->



@endsection

@section('admin_script')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection