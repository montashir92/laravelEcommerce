@extends('backend.layouts.admin_master')
@section('admin_content')


  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-plus"></i> Update Product
                </h3>
                
                <a href="{{ route('products.index') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Product List</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="{{ route('products.update', $editData->id) }}" method="post" id="myForm" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                      <div class="col-sm-8">
                          <input type="text" name="name" value="{{ $editData->name }}" class="form-control" id="name">
                          <font style="color: red">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="description" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-8">
                          <textarea rows="4" name="description" class="textarea" id="description">
                              {{ $editData->description }}
                          </textarea>
                          <font style="color: red">{{ ($errors->has('description')) ? ($errors->first('description')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="product_key" class="col-sm-2 col-form-label">Product Key</label>
                      <div class="col-sm-5">
                          <input type="text" name="product_key" value="{{ $editData->product_key }}" class="form-control" id="product_key">
                          <font style="color: red">{{ ($errors->has('product_key')) ? ($errors->first('product_key')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="price" class="col-sm-2 col-form-label">Product Price</label>
                      <div class="col-sm-5">
                          <input type="text" name="price" value="{{ $editData->price }}" class="form-control" id="price">
                          <font style="color: red">{{ ($errors->has('price')) ? ($errors->first('price')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="quantity" class="col-sm-2 col-form-label">Product Quantity</label>
                      <div class="col-sm-5">
                          <input type="number" name="quantity" value="{{ $editData->quantity }}" class="form-control" id="quantity">
                          <font style="color: red">{{ ($errors->has('quantity')) ? ($errors->first('quantity')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="category_id" class="col-sm-2 col-form-label"> Category</label>
                      <div class="col-sm-5">
                          <select class="form-control" name="category_id" id="category_id">
                              <option value="">Select Category Option</option>
                              @foreach(App\Models\Category::where('parent_id', NULL)->get() as $parent)
                              <option value="{{ $parent->id }}" {{ ($parent->id == $editData->category->id) ? 'selected' : '' }}>{{ $parent->name }}</option>
                              
                              @foreach(App\Models\Category::where('parent_id', $parent->id)->get() as $child)
                              <option value="{{ $child->id }}" {{ ($child->id == $editData->category->id) ? 'selected' : '' }}>-->{{ $child->name }}</option>
                              @endforeach
                              
                              @endforeach
                          </select>
                          <font style="color: red">{{ ($errors->has('category_id')) ? ($errors->first('category_id')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="brand_id" class="col-sm-2 col-form-label"> Brand</label>
                      <div class="col-sm-5">
                          <select class="form-control" name="brand_id" id="brand_id">
                              <option value="">Select Brand Option</option>
                              @foreach($brands as $brand)
                              <option value="{{ $brand->id }}" {{ ($brand->id == $editData->brand->id) ? 'selected' : '' }}>{{ $brand->name }}</option>
                              @endforeach
                          </select>
                          <font style="color: red">{{ ($errors->has('brand_id')) ? ($errors->first('brand_id')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="available" class="col-sm-2 col-form-label"> Product Available</label>
                      <div class="col-sm-5">
                          <select class="form-control" name="available" id="available" value="{{ $editData->available }}">
                              <option value="">Select Product Available</option>
                              <option value="1">In Stock</option>
                              <option value="0">Out of Stock</option>
                          </select>
                          <font style="color: red">{{ ($errors->has('available')) ? ($errors->first('available')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="condition" class="col-sm-2 col-form-label"> Product Condition</label>
                      <div class="col-sm-5">
                          <select class="form-control" name="condition" id="condition" value="{{ $editData->condition }}">
                              <option value="">Select Product Condition</option>
                              <option value="1">New</option>
                              <option value="0">Old</option>
                          </select>
                          <font style="color: red">{{ ($errors->has('condition')) ? ($errors->first('condition')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
                      <div class="col-sm-5">
                          <input type="file" name="image[]" class="form-control" multiple>
                      </div>
                      
                      <div class="col-md-3">
                          @php $i = 1; @endphp
                          @foreach($editData->images as $img)
                          <img src="{{ asset('images/products/'.$img->image) }}" width="50" alt="">
                          @php $i++; @endphp
                          @endforeach
                      </div>
                      
                      
                      
                    </div>

                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update change</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-times"></i> Clear</button>
                      </div>
                    </div>
                  </form>
                  
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>



@endsection

@section('admin_script')

<script type="text/javascript">
$(document).ready(function () {
  
  $('#myForm').validate({
    rules: {
      category_id: {
        required: true
      },
      brand_id: {
        required: true
      },
      name: {
        required: true
      },
      description: {
        required: true
      },
      price: {
        required: true
      },
      product_key: {
        required: true
      },
      quantity: {
        required: true
      },
      available: {
        required: true
      },
      condition: {
        required: true
      }
    },
    messages: {
      category_id: {
        required: "Please enter a Product Category"
      },
      brand_id: {
        required: "Please enter a Product Brand"
      },
      name: {
        required: "Please enter a Product Name"
      },
      description: {
        required: "Please enter a Product Description"
      },
      price: {
        required: "Please enter a Product Price"
      },
      product_key: {
        required: "Please enter a Product Key"
      },
      quantity: {
        required: "Please enter a Product Quantity"
      },
      available: {
        required: "Please enter a Product Available"
      },
      condition: {
        required: "Please enter a Product Condition"
      }
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script>
    document.getElementById('available').value = {{ $editData->available }};
    document.getElementById('condition').value = {{ $editData->condition }};
</script>
@endsection

