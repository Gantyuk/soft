<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]>
<html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]>
<html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
    @include('layouts.header')
</head>
<body>
<div class="top_header">
    <div class="container">
        <div class="row">
            <div class="col-md-5 ">
                <img class="logo" src="{{ asset('img/logo.png') }}"/>
                <div class="Quality">
                    QUALITY C# DEVELOPMENT & C# DEVELOPERS FOR HIRE
                </div>
                <div class="rectangle">
                    More than <label style="color:#dcb64b">80</label> C# developers.
                </div>
            </div>
            <div class="col-md-7 hidden-sm hidden-xs ">
                <div class="soc_buttons">
                    <a href="#">
                        <img src="{{ asset('img/social_icon/twitter.png')}}">
                    </a>
                    <a href="#">
                        <img src="{{ asset('img/social_icon/faceboook.png')}}">
                    </a>
                    <a href="#">
                        <img src="{{ asset('img/social_icon/google.png')}}">
                    </a>
                    <a href="#">
                        <img src="{{ asset('img/social_icon/vk.png')}}">
                    </a>
                </div>
                <div class="contacts">
                    <a href="#">
                        +1-845-564-5532 +38-044-262-2277
                        <img src="{{ asset('img/social_icon/phone.png')}}">
                    </a>
                    <div class="skyp">
                        <a href="#">
                            NetDevelopersNet
                            <img src="{{ asset('img/social_icon/skype.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="menu_hidden hidden-md  hidden-lg col-sm-12 col-xs-12 ">
    <boutons class="Button_menu"><img src="{{ asset('img/Icon_menu.png')}}"></boutons>
</div>

<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="ul">
                    <li class="li"><a class="activ" href="/">Home</a></li>
                    <li class="li"><a href="#">C# Development</a></li>
                    <li class="li"><a href="#">Hire C# Developers</a></li>
                    <li class="li"><a href="#">Dedica C# Team</a></li>
                    <li class="li"><a href="#">Company</a></li>
                    <li class="li"><a href="#">Contacts</a></li>
                    <li class="li"><a href="#">Sitemap</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="hidden-lg hidden-md col-sm-12 col-xs-12 ">
            <div class="soc_buttons_smal">
                <a href="#">
                    <img src="{{ asset('img/social_icon/twitter.png')}}">
                </a>
                <a href="#">
                    <img src="{{ asset('img/social_icon/faceboook.png')}}">
                </a>
                <a href="#">
                    <img src="{{ asset('img/social_icon/google.png')}}">
                </a>
                <a href="#">
                    <img src="{{ asset('img/social_icon/vk.png')}}">
                </a>
            </div>
            <div class="contacts_smal">
                <a href="#">
                    <img src="{{ asset('img/social_icon/phone.png')}}">
                    +1-845-564-5532 +38-044-262-2277
                </a>
                <div style="padding-top:10px;">
                    <a href="#">
                        <img src="{{ asset('img/social_icon/skype.png')}}">
                        NetDevelopersNet
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('request')
<div class="col-md-2 col-md-offset-1 col-sm-12 hidden-sm right-bar">
    <nav class="nav-sidebar nav-right ">

        <ul class="nav text-center">


            @include('pages.navigation-sidebar')

        </ul>
    </nav>
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
    $('.fixed-menu-panel').click(function () {
        $('.fixed-menu').css('display', 'block');
        $(this).css('display', 'none');
    });

    $('.fixed-menu i').click(function () {

        $('.fixed-menu').css('display', 'none');
        $('.fixed-menu-panel').css('display', 'block');
    });
</script>

<div class="foter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fouter_lincs">
                    <a href="#">About Us </a> |
                    <a href="#"> Contact</a> |
                    <a href="#"> Site Map</a>
                    <div class="Copyright">
                        Copyright © c-developers.net | © 2005 - 2017
                    </div>
                </div>
                <div class="technologies">
                    All Rights Reserved. Design: c-developers.net Technologies
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.script')
</body>
</html>