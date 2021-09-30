<style>
    nav svg{
        height: 20px;
    }
    nav .hidden{
        display: block !important;
    }

</style>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4">

        <div class="card mb-3 text-center">
            <a href="{{ route('product.show', $product->slug) }}">
                @php $i = 1; @endphp
                @foreach($product->images as $img)
                @if($i > 0)
                <img src="{{ asset('images/products/'.$img->image) }}" class="card-img-top freature_img" alt="..." height="250">
                @endif
                @php $i--; @endphp
                @endforeach
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Price:</strong> TK. {{ number_format($product->price, 2) }}</p>
                
                @include('frontend.pages.products.partials.cart_bottom')
            </div>
        </div>
    </div>
    @endforeach



</div>

<div class="mb-4 mt-4">
    {{ $products->links() }}
</div>