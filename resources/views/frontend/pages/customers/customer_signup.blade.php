@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Customer Signup
@endsection

<style type="text/css" media="screen">

    #login .container #login-row #login-column #login-box {
        margin-bottom: 40px;
        margin-top: 40px;
        max-width: 600px;
        min-height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>

<section class="slider mt-4">   <!-- Slider Start Here-->
    <div class="container">

        <div class="product-slider">
            <h3 class="text-center">Customer Signup Page</h3>
        </div>
    </div>

</section> <!-- Slider End Here-->



<div id="login">

    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="{{ route('customer.signup.store') }}" method="post">

                        @csrf

                        <h3 class="text-center text-info">Signup</h3>

                        <div class="form-group">
                            <label for="name" class="text-info">Full Name:</label><br>
                            <input type="text" name="name" id="name" class="form-control">
                            <font style="color: red">{{ ($errors->has('name')) ? ($errors->first('name')) : '' }}</font>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-info">Email Address:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                            <font style="color: red">{{ ($errors->has('email')) ? ($errors->first('email')) : '' }}</font>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="text-info">Mobile Number:</label><br>
                            <input type="text" name="mobile" id="mobile" class="form-control">
                            <font style="color: red">{{ ($errors->has('mobile')) ? ($errors->first('mobile')) : '' }}</font>
                        </div>
                        
                        <div class="form-group">
                            <label for="mobile" class="text-info">Division:</label><br>
                            <select class="form-control" name="division_id" id="division_id">
                                <option value="">Select Division Option</option>
                                @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            <font style="color: red">{{ ($errors->has('division_id')) ? ($errors->first('division_id')) : '' }}</font>
                        </div>
                        
                        <div class="form-group">
                            <label for="mobile" class="text-info">District:</label><br>
                            <select class="form-control" name="district_id" id="district_id">
                                
                            </select>
                            <font style="color: red">{{ ($errors->has('district_id')) ? ($errors->first('district_id')) : '' }}</font>
                        </div>
                        
                        <div class="form-group">
                            <label for="street_addres" class="text-info">Street Address:</label><br>
                            <input type="text" name="street_addres" id="street_addres" class="form-control">
                            <font style="color: red">{{ ($errors->has('street_addres')) ? ($errors->first('street_addres')) : '' }}</font>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                            <font style="color: red">{{ ($errors->has('password')) ? ($errors->first('password')) : '' }}</font>
                        </div>

                        <div class="form-group">
                            <label class="text-info">Confirm Password:</label><br>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                            <font style="color: red">{{ ($errors->has('confirm_password')) ? ($errors->first('confirm_password')) : '' }}</font>
                        </div>



                        <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Register">
                            <i class="fa fa-user"></i> Have You Account ? <a href="{{ route('customer.login') }}"><span>Login Here</span></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>

<script>
    $(document).on('change', '#division_id', function(){
        var division_id = $(this).val();
        
        $.ajax({
            url: "{{ route('get.district') }}",
            type: "GET",
            data: {division_id:division_id},
            success: function(data){
                var html = '<option value="">Select District Option</option>';
                $.each(data, function(key, v){
                    html += '<option value="'+v.id+'">'+v.name+'</option>';
                });
                $("#district_id").html(html);
            }
        });
    });
</script>


<script>
    $(function () {

        $('#login-form').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                },
                mobile: {
                    required: true
                },
                division_id: {
                    required: true
                },
                district_id: {
                    required: true
                }

            },

            messages: {
                name: {
                    required: "Please Provide a User Name"
                },
                email: {
                    required: "Please Provide a User Email",
                    email: "Please provide A Vaild Email"
                },
                password: {
                    required: "Please Provide a User Password",
                    minlength: "password will be 8 Character"
                },
                confirm_password: {
                    required: "Please Provide a Confirm Password",
                    equalTo: "Confirm Password Does Not Match!"
                },
                mobile: {
                    required: "Please Enter Your Mobile Number"
                },
                division_id: {
                    required: "Please Enter Your Division Name"
                },
                district_id: {
                    required: "Please Enter Your District Name"
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