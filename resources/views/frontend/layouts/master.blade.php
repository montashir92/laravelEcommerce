<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'E-Bazaar')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('frontend.partials.style')
    </head>

    <body>



        <div class="wrapper">
            @include('frontend.partials.header')
            


            @yield('main_content')


            @include('frontend.partials.footer')
            


        </div>


        <!--Script Start Here-->

        @include('frontend.partials.script')
        @yield('scripts')
        @include('sweetalert::alert')
        
    </body>
</html>