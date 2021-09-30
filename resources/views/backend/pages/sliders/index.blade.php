@extends('backend.layouts.admin_master')
@section('admin_content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Slider</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Slider</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> View Slider List</h3>
                        <a href="#addModal" class="btn btn-success btn-sm float-right" data-toggle="modal"><i class="fas fa-plus-circle"></i> Add New Slider</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <!-- Add Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Slider</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Title</label>
                                      <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
                                      <font style="color: red">{{($errors->has('title'))?($errors->first('title')):''}}</font>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Slider Image</label>
                                      <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                      <font style="color: red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Priority</label>
                                      <input type="text" name="priority" class="form-control" id="exampleInputPassword1" placeholder="Enter Priority">
                                      <font style="color: red">{{($errors->has('priority'))?($errors->first('priority')):''}}</font>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Button Text</label>
                                      <input type="text" name="button_text" class="form-control" id="exampleInputPassword1" placeholder="Enter Button Text">
                                      <font style="color: red">{{($errors->has('button_text'))?($errors->first('button_text')):''}}</font>
                                    </div>

                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Button Link</label>
                                      <input type="text" name="button_link" class="form-control" id="exampleInputPassword1" placeholder="Enter Button Link">
                                      <font style="color: red">{{($errors->has('button_link'))?($errors->first('button_link')):''}}</font>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Save change</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                              </div>
                            </div>
                          </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Button Text</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $slider)
                                
                                <tr class="{{ $slider->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{ asset('images/sliders/'.$slider->image) }}" width="50" height="50" alt=""></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->button_text }}</td>
                                    <td><span class="badge badge-success">Published</span></td>
                                    <td>
                                        <a href="#editModal{{ $slider->id }}" title="Edit" class="btn btn-success btn-sm" data-toggle="modal"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('sliders.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$slider->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        
                                        
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Slider</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                  <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                                      @csrf
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Title</label>
                                                      <input type="text" name="title" value="{{ $slider->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
                                                      <font style="color: red">{{($errors->has('title'))?($errors->first('title')):''}}</font>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Slider Image</label>
                                                      <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                                                      <img src="{{ asset('images/sliders/'.$slider->image) }}" class="mt-2" width="100" alt="">
                                                      <font style="color: red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="exampleInputPassword1">Priority</label>
                                                      <input type="text" name="priority" value="{{ $slider->priority }}" class="form-control" id="exampleInputPassword1" placeholder="Enter Priority">
                                                      <font style="color: red">{{($errors->has('priority'))?($errors->first('priority')):''}}</font>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="exampleInputPassword1">Button Text</label>
                                                      <input type="text" name="button_text" value="{{ $slider->button_text }}" class="form-control" id="exampleInputPassword1" placeholder="Enter Button Text">
                                                      <font style="color: red">{{($errors->has('button_text'))?($errors->first('button_text')):''}}</font>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="exampleInputPassword1">Button Link</label>
                                                      <input type="text" name="button_link" value="{{ $slider->button_link }}" class="form-control" id="exampleInputPassword1" placeholder="Enter Button Link">
                                                      <font style="color: red">{{($errors->has('button_link'))?($errors->first('button_link')):''}}</font>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary">Update change</button>
                                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                                </form>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
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
<!-- /.content -->



@endsection

@section('admin_script')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection