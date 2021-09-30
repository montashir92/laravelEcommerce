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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Order No</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>#LE-{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>
                                            @if($order->is_seen_by_admin)
                                            <span class="badge badge-success">Seen</span>
                                            @else
                                            <span class="badge badge-warning">Unseen</span>
                                            @endif

                                            @if($order->is_complete)
                                            <span class="badge badge-success">Complete</span>
                                            @else
                                            <span class="badge badge-warning">Uncomplete</span>
                                            @endif

                                            @if($order->is_paid)
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-warning">Unpaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('customer.order.details', $order->id) }}" title="Details" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
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
