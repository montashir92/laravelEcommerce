@extends('frontend.layouts.master')
@section('main_content')

@section('title')
E-Bazaar - Contact Page
@endsection


<section>   <!-- Main Content Start Here-->
    <div class="container mt-4">

        <div class="contact_us">
            <h3>Contact Us</h3>
            <img src="{{ asset('frontend/img/mapp.jpg') }}" alt="">
        </div>

        <div class="row">


            <div class="col-md-5">
                <div class="contact_info">
                    <h3>CONTACT INFO</h3>

                    <address class="address">
                        <p>E-BAZZAR Inc.</p>
                        <p>935 W. Webster Ave New Streets </p>
                        <p>Chicago, IL 60614, NY</p>
                        <p>Newyork USA</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@e-shopper.com</p>
                    </address>
                </div>
            </div>


            <div class="col-md-7">

                <div class="contact_form">
                    <h3>Get in Touch</h3>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputemail">Email</label>
                                <input type="email" class="form-control" id="inputemail" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Subject</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Message</label>

                            <textarea class="form-control" rows="4" placeholder="Message..."></textarea>

                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</section>  <!-- Main Content End Here-->


@endsection
