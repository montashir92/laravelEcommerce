@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - My Profile
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
            <h3 class="text-center">My Profile</h3>
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

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-1">
                    
                </div>
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="img-circle text-center">
                                <img src="{{ (!empty($user->image)) ? asset('images/users/'.$user->image) : asset('images/default/no.jpg') }}" alt="">

                            </div>
                            <h3 class="text-center">{{ $user->name }}</h3>
                            <p class="text-center">{{ $user->address }}</p>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Mobile No</strong></td>
                                        <td>{{ $user->mobile }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td>{{ $user->gender }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="{{ route('customer.edit.profile') }}" class="btn btn-primary btn-block">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection