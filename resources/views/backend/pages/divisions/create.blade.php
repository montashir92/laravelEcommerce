@extends('backend.layouts.admin_master')
@section('admin_content')


  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Division</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Division</li>
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
                    <i class="fas fa-edit"></i> Update Division
                    @else
                    <i class="fas fa-plus"></i> Add New Division
                    @endif
                </h3>
                
                <a href="{{ route('divisions.index') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Division List</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="{{ (@$editData) ? route('divisions.update', $editData->id) : route('divisions.store') }}" method="post" id="myForm" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Division Name</label>
                      <div class="col-sm-5">
                          <input type="text" name="name" value="{{ @$editData->name }}" class="form-control" id="name">
                          <font style="color: red">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="priority" class="col-sm-2 col-form-label">Priority</label>
                      <div class="col-sm-5">
                          <input type="text" name="priority" value="{{ @$editData->priority }}" class="form-control" id="priority">
                          <font style="color: red">{{ ($errors->has('priority')) ? ($errors->first('priority')) : '' }}</font>
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
      priority: {
        required: true
      }
    },
    messages: {
      name: {
        required: "Please enter a Division Name"
      },
      priority: {
        required: "Please enter a Division Image",
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

@endsection
