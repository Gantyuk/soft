@extends('layouts.master_c')

@section('request')

    <div class="heder">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="development">C# DEVELOPMENT</div>
                    <div class="content_header">
                        C-developers.net has the finest quality C# developers so we can offer clients a superior
                        service. In part,this is because we are willing to push boundaries to find innovative solutions
                        to fulfil client expectations,
                        no matter how complex the project.
                    </div>
                    <a class="header_button" href="#">REQUEST fre QUOTE</a>
                </div>
            </div>
        </div>
    </div>

    <div class="heder2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="lable">
                        <img src="{{ asset('img/Layer%201.png')}}"><br>
                        C# <br>DEVELOPMENT
                    </div>
                    <div class="text">
                        C- developers.net offers c#development of the highest quality since we are not afraid to
                        genetrate completely new solutions
                        while working on the most sophisticated projects according to custumers` expactztions.
                    </div>
                    <div class="lable">
                        <img src="{{ asset('img/experienced.png')}}"><br>
                        C# <br>DEVELOPERS
                    </div>
                    <div class="text">
                        Our developers`skills,mastery and experties will be very beneficial for our cooperation if you
                        need the best C# development solutions and services to be implemented in yor multiple projects.
                    </div>
                </div>
                <img class="center" src="{{ asset('img/Ellipse1.png')}}">
                <div class="col-md-6 ">
                    <div class="lable">
                        <img src="{{ asset('img/virtual-server-icon-7.png')}}"><br>
                        DEDICATED <br>DEVELOPMENT TEAM
                    </div>
                    <div class="text">
                        C- developers.net are ready to assist you right now. We will adhere to all your project
                        tequirements regardless of your project requirements regardless of your expectationa. Our
                        dedicated team will manage to handle any task.
                    </div>
                    <div class="lable">
                        <img src="{{ asset('img/benefit%20icon.png')}}"><br>
                        OUR BENEFITS <br><br>
                    </div>
                    <div class="text">
                        WE strive for long-term cooperation with our customers event if project has been alredy
                        completed. We deliver services without fake promises, see for yourself!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="heder3">
        <div class="container">
            <div class="row">
                <div class="col-md-2 "></div>
                <div class="col-md-8">
                    <div class="quote">QUICK FREE QUOTE</div>
                    <div class="senior">
                        Senior developers. Take a 1 week risk free trial. <br>
                        Starting at $1850 a month.
                    </div>
                    <div class="None">
                        None of your personal data will be sold. No spam is guaranteed.
                    </div>
                    <div class="forma">
                        <form id="request_fre_quote_now" action="#">
                            <input type="text" id="name1" placeholder="Name *" name="name" required>
                            <input type="text" id="email1" placeholder="E-mail *" name="email" required>
                            <input type="text" id="skype" placeholder="Skype *" name="skype" required>
                            <input type="text" id="telephone" placeholder="Telephone *" name="telephone" required>
                            <textarea placeholder="Requirements" id="Requirements" name="Requirements"></textarea>
                            <input type="submit" value="REQUEST FREE QUOTE NOW!">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="col-md-2 "></div>
            </div>
        </div>
    </div>

    <div class="heder4">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="who">WHO WE ARE?</div>
                    <div class="list">
                        <ul>
                            <li>
                                1100+ Completed C# Projects
                            </li>
                            <li>
                                80+ C# Professionals from the USA, UK and Ukraine
                            </li>
                            <li>
                                Client Base consisting of more than 800 Customers
                            </li>
                            <li>
                                400,000+ Working Hours in the field of C# Development
                            </li>
                            <li>
                                Numerous Certificates of our Company and Personnel
                            </li>
                            <li>
                                Mastery and Expertise in C# Development
                            </li>
                            <li>
                                All Kinds of Services in C# Programming
                            </li>
                            <li>
                                Highly Confidential Services and Protection of Intellectual • Rights
                            </li>
                            <li>
                                Perfect and Professional Methods of Communication
                            </li>
                            <li>
                                Round-the-clock Assistance
                            </li>
                        </ul>
                    </div>
                    <div class="buton_heder">
                        <a class="header_button" href="#">REQUEST FRE QUOTE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="heder5">
        <div class="container">
            <div class="row">
                <div class="col-md-1 hidden-sm hidden-xs"></div>
                <div class="col-md-10 col-ms-12 col-xs-12">
                    <div class="hapy">
                        WE WILL BE HAPPY TO SERVE ALL YOUR IT NEEDS.<br>
                        DO NOT HESITATE TO CONTACT US IN CASE OF ANY ISSUES
                    </div>
                </div>
                <div class="col-md-1 hidden-sm hidden-xs"></div>
            </div>
        </div>
    </div>

@endsection
