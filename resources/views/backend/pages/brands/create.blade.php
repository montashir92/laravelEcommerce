@extends('backend.layouts.admin_master')
@section('admin_content')


  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
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
                    @if(isset($editData))
                    <i class="fas fa-edit"></i> Update Brand
                    @else
                    <i class="fas fa-plus"></i> Add New Brand
                    @endif
                </h3>
                
                <a href="{{ route('brands.index') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Brand List</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="{{ (@$editData) ? route('brands.update', $editData->id) : route('brands.store') }}" method="post" id="myForm" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Brand Name</label>
                      <div class="col-sm-5">
                          <input type="text" name="name" value="{{ @$editData->name }}" class="form-control" id="name">
                          <font style="color: red">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
                      <div class="col-sm-5">
                          <input type="file" name="image" class="form-control" id="image">
                          <font style="color: red">{{ ($errors->has('image')) ? ($errors->first('image')) : '' }}</font>
                      </div>
                      
                      <div class="col-md-2">
                          <img src="{{ asset('images/brands/'.@$editData->image) }}" width="100" id="showImage" alt="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> {{ (@$editData)?'Update change':'Save change' }}</button>
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
      name: {
        required: true
      },
      image: {
        image: true
      }
    },
    messages: {
      name: {
        required: "Please enter a Brand Name"
      },
      image: {
        image: "Please enter a Valid Image Name",
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
    $(document).ready(function(){
        $("#image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#showImage").attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
