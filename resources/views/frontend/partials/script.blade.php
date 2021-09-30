<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
<!--<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>-->

<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/all.js') }}"></script>

<!-- jquery-validation -->
<script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    function addToCart(product_id){
        $.post("http://localhost/laravelEcommerce/api/carts/store",
        {
            product_id: product_id
        })
        
        .done(function(data){
            data = JSON.parse(data);
            if(data.status == 'success'){
                //Toast
                alertify.set('notifier','position', 'top-right');
                alertify.success('Items Added to Cart');
                //alertify.success('Items Added Cart Successfully : '+data.totalItems+ '<br/> To Checkout <a href="{{ route('carts') }}">go to check page</a>');
                $("#totalItems").html(data.totalItems);
            }
        });
    }
      
</script>