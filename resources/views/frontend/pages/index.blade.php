@extends('frontend.layouts.master')
@section('main_content')

@include('frontend.partials.slider')


<section>   <!-- Main Content Start Here-->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.partials.sidebar')

            </div>


            <div class="col-md-9">
                <div class="content">

                    <h2 class="text-center">Freatured Product</h2>

                    
                    @include('frontend.pages.products.partials.all_product')

                </div>

            </div>
        </div>
    </div>

</section>  <!-- Main Content End Here-->
@endsection
