@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Search Product
@endsection


<section class="slider">   <!-- Slider Start Here-->
    <div class="container">

        <div class="category_slide">

            <h2>Search Keyword: <span class="shadow-sm p-3 mb-5 bg-white rounded">{{ $search }}</span></h2>
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

                    <h2 class="text-center">Search Product</h2>
                    
                        @include('frontend.pages.products.partials.all_product')
                    
                </div>

            </div>
        </div>
    </div>

</section>  <!-- Main Content End Here-->


@endsection