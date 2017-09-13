<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>


    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
<header>
    <div class="container">
        <div class="row wrapper">
            <div class="col-md-5 col-sm-8 col-xs-10 logo">
                <a href="{{ url('/') }}"><img class="img-responsive" src="{{ url('assets/img/logo.png') }}"></a>
                <p class="first ">Quality JS Development & JS Developers for hire </p>
                <div class="last"><p>More than <b>80</b> JavaScript developers.</p></div>
            </div>
            <div class="col-md-4 col-md-offset-3 hidden-sm hidden-xs sociol-i">
                <div class="row social list-inline">
                    <ul>
                        <li class="item"><a href="#"><img src="{{ url('assets/img/twitter.png') }}"></a></li>
                        <li class="item"><a href="#"><img src="{{ url('assets/img/faceboook.png') }}"></a></li>
                        <li class="item"><a href="#"><img src="{{ url('assets/img/google.png') }}"></a></li>
                        <li class="item"><a href="#"><img src="{{ url('assets/img/vk.png') }}"></a></li>
                    </ul>
                </div>
                <div class="row contact">
                    <div class="circle"><img src="{{ url('assets/img/phone.png') }}"></div>

                    <div class="col-md-10   number">+1-415-101-2532 &emsp; +38-044-206-4815</div>
                </div>
                <div class="row contact">
                    <div class="circle"><img src="{{ url('assets/img/skype.png') }}"></div>

                    <div class="col-md-10   number">JSDevelopersNet</div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid ">
        <div class="row">
            <div class="nav-bar row">
                <div class="container">
                    <nav class="navbar ">
                        <div class="navbar-header center-block">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar" class="container-fluid center-block navbar-collapse collapse">

                            @include('pages.navigation')
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class=" hidden-lg hidden-md mobil-social col-sm-12 col-xs-12">

    </div>
</header>
<div class="content-block ">
    <div class="container ">
        <div class="row">
            <div class="col-md-9 col-sm-12 text">

                @yield('content')


            </div>
            <div class="col-md-2 col-md-offset-1 col-sm-12 hidden-sm right-bar">
                <nav class="nav-sidebar nav-right ">

                    <ul class="nav text-center">


                    @include('pages.navigation-sidebar')





                    <!--li class="nav-divider"></li>
                    <li><a href="#" class="tree-toggler">Header 1</a>
                        <ul class="nav nav-list tree">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-divider"></li>

                    <li><a href="#" class="tree-toggler">Header 1</a>
                        <ul class="nav nav-list tree">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-divider"></li>
                    <li><a href="#" class="tree-toggler">Header 1</a>
                        <ul class="nav nav-list tree">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-divider"></li-->

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 nopadding ">
                <ul class="list-inline">
                    <li class="item"><a href="#">About Us</a></li>
                    <li class="item"><a href="#">Contact</a></li>
                    <li class="item"><a href="#">Site Map</a></li>
                </ul>
                <div class="col-md-12 col-xs-12 nopadding copyright">Copyright © js-developers.com | © 2005 - 2017</div>
            </div>
            <div class="col-md-6 col-md-offset-2 reserved">
                All Rights Reserved. Design: js-developers.com Technologies
            </div>

        </div>
    </div>
</div>
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script>
    $(document).ready(function () {
        $('.tree-toggler').parent().children('ul.tree').toggle(300);
        $('.tree-toggler').click(function () {
            $(this).parent().children('ul.tree').toggle(300);
        });
    });
    function sizeng() {
        if ($(window).width() <= 1200) {
            var val = $(".sociol-i").html();
            $(".mobil-social").html(val);
            $("contact").addClass("col-xs-12");

        } else {
            $("contact").removeClass("col-xs-12");
        }
    }
    $(document).ready(function () {
        sizeng();
    });
    $(window).resize(function () {

        sizeng();

    });
</script>


@yield('scripts')

<script>
    $('.navbar-nav li').click(function () {
        $('.navbar-nav li').removeClass('active');
        $(this).addClass('active');
    });
</script>

<script>
    $('.fixed-menu-panel').click(function () {
        $('.fixed-menu').css('display', 'block');
        $(this).css('display', 'none');
    });

    $('.fixed-menu i').click(function () {
        $('.fixed-menu').css('display', 'none');
        $('.fixed-menu-panel').css('display', 'block');
    });
</script>
</body>
</html>
