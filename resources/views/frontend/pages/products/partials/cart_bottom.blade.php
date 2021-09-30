<form action="{{ route('cart.store') }}" method="post">
    @csrf
    
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    
    <button type="button" class="btn btn-outline-warning" onclick="addToCart({{ $product->id }})"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
</form>