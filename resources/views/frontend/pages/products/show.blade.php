@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Products Details
@endsection


<section>   <!-- Main Content Start Here-->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.partials.sidebar')

            </div>


            <div class="col-md-9 mt-4">
                <div class="content">

                    <div class="details_content">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="card card-body details_img">
                                    @php $i = 1; @endphp
                                    @foreach($product->images as $img)
                                    @if($i > 0)
                                    <img src="{{ asset('images/products/'.$img->image) }}" height="350" alt="">
                                    @endif
                                    @php $i--; @endphp
                                    @endforeach
                                </div>
                                
                                <div id="carouselExampleControls" class="carousel slide mt-2" data-ride="carousel">
                                    <div class="carousel-inner">
                                      @php $i = 1; @endphp
                                      @foreach($product->images as $image)
                                      <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                                          <img src="{{ asset('images/products/'.$image->image) }}" height="190" class="d-block w-100" alt="...">
                                      </div>
                                       @php $i++; @endphp
                                       @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="card card-body product_details_info">
                                    <h3>{{ $product->name }}</h3>
                                    <h4>Web ID: {{ $product->product_key }}</h4>
                                    <img src="{{ asset('frontend/img/star.png') }}" alt="">
                                    <h1>MRP TK. {{ number_format($product->price, 2) }}</h1>

                                    <form>
                                        <div class="form-row">
                                            <label>Quantity:</label>
                                            <div class="col">

                                                <input type="number" class="form-control" value="{{ $product->quantity }}">
                                            </div>

                                            <button type="submit" class="btn btn-warning"><i class="fas fa-cart-arrow-down"></i> Add to cart</button>

                                        </div>
                                    </form>

                                    <p><strong>Availability:</strong> 
                                        @if($product->available == 1)
                                            In Stock
                                        @else
                                            Out of Stock
                                        @endif
                                        
                                    </p>
                                    <p><strong>Condition:</strong>
                                        @if($product->condition == 1)
                                            New
                                        @else
                                            Old
                                        @endif
                                        
                                    </p>
                                    <p><strong>Brand:</strong> {{ $product->brand->name }}</p>

                                    <div class="product_social_button">
                                        <div class="row">
                                            <button><i class="fab fa-facebook-square"></i> Like</button>

                                            <button><i class="fab fa-twitter-square"></i> Tweet</button>

                                            <button><i class="fab fa-pinterest-square"></i>Pin it</button>

                                            <button><i class="fas fa-plus-square"></i> Share</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="product_details_description">


                        <div class="shadow-sm p-3 mb-5 bg-white rounded">
                            <h3>Product Details</h3>
                        </div>
                        <div class="card card-body">

                            <p>{!! $product->description !!}</p>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

</section>  <!-- Main Content End Here-->


@endsection