@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Category Product
@endsection


<section class="slider">   <!-- Slider Start Here-->
    <div class="container">

        <div class="category_slide">

            <h2>Category Name: <span class="shadow-sm p-3 mb-5 bg-white rounded">{{ $category->name }}</span></h2>
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

                    <h2 class="text-center">Category Product</h2>
                    
                    @php
                        $products = $category->products()->paginate(9);
                    @endphp
                    
                    @if($products->count() > 0)
                        @include('frontend.pages.products.partials.all_product')
                    @else
                    <div class="alert alert-warning">
                        No Product has Added yet in this Category
                    </div>
                    @endif

                    


                </div>

            </div>
        </div>
    </div>

</section>  <!-- Main Content End Here-->


@endsection