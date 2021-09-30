@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Products Pages
@endsection


<section class="slider mt-4">   <!-- Slider Start Here-->
    <div class="container">

        <div class="product-slider">
            <h3 class="text-center">Limited Time offer - Order Today For <span>$99</span></h3>
        </div>
    </div>

</section>       <!-- Slider End Here-->


<section>   <!-- Main Content Start Here-->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.partials.sidebar')

            </div>


            <div class="col-md-9">
                <div class="content">

                    <h2 class="text-center">Freaturs Items</h2>

                    @include('frontend.pages.products.partials.all_product')


                </div>



            </div>

</section>  <!-- Main Content End Here-->

@endsection
