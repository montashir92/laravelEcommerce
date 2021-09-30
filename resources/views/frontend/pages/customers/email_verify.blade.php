@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Verify Email
@endsection

<style type="text/css" media="screen">

    #login .container #login-row #login-column #login-box {
        margin-bottom: 40px;
        margin-top: 40px;
        max-width: 600px;
        height: 320px;
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
            <h3 class="text-center">Email Verification Form</h3>
        </div>
    </div>

</section> <!-- Slider End Here-->



<div id="login">

    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="{{ route('customer.email.verify.store') }}" method="post">
                        @csrf

                        <h3 class="text-center text-info">Email Verify</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email Address:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                            <font style="color: red">{{ ($errors->has('email')) ? ($errors->first('email')) : '' }}</font>
                        </div>

                        <div class="form-group">
                            <label for="code" class="text-info">Verify Code:</label><br>
                            <input type="text" name="code" id="code" class="form-control">
                            <font style="color: red">{{ ($errors->has('code')) ? ($errors->first('code')) : '' }}</font>
                        </div>

                        <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Verify">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')

<script>
    $(function () {

        $('#login-form').validate({
            rules: {

                email: {
                    required: true,
                    email: true
                },
                code: {
                    required: true
                }

            },

            messages: {

                email: {
                    required: "Please Provide a Email Address",
                    email: "Please provide A Vaild Email"
                },
                code: {
                    required: "Please Enter Varification Code"
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