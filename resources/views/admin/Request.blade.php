@extends('layouts.master_c')


@section('request')
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/pages.css') }}">
    <div class="table">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <table class="table table-bordered table-striped">
                        <?php $i = 1;?>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" id="name" autocomplete="off"></td>
                            <td><input type="text" id="email" autocomplete="off"></td>
                            <td><input type="text" id="creat" autocomplete="off"></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($request as $req)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $req->name }}</td>
                                <td>{{ $req->email }}</td>
                                <td>{{ $req->created_at }}</td>
                                <td><a href="#edit{{$req->id}}" class="fancybox"><i class="fa fa-pencil"
                                                                                    aria-hidden="true"></i></a>
                                    <a href="#viev{{$req->id}}" class="fancybox"><i class="fa fa-eye"
                                                                                    aria-hidden="true"></i></a>
                                    <a href="/admin/quote/deleted/{{$req->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>

                            </tr>


                            <?php $i++;?>
                        @endforeach
                        </tbody>

                    </table>
                    {{--{{ $request->links() }}--}}
                </div>
            </div>
        </div>
    </div>

    <style>
        td input[type=text] {
            width: 93%;
            border-style: groove;
            border-radius: 5px;
        }

        .table {
            margin-top: 25px;
        }

        .in {
            padding: 5px;
            border-style: groove;
            border-radius: 5px;
            width: 350px;

        }

        form label {
            margin-top: 15px;
        }

        input[type=submit] {
            border-radius: 0.141cm;
            background-color: rgb(250, 185, 23);
            font-weight: 700;
            font-size: 17px;
            font-family: "HelveticaNeueCyr";
            color: rgb(255, 255, 255);
            text-decoration: none;
            padding: .6em 1em calc(.6em + 3px);
            border: none;
            margin-left: 35%;
            margin-top: 15px;
        }
        a i {
            display: inline-block !important;
        }
    </style>
    @foreach($request as $req)
        <div class="hidden">
            <form id="viev{{$req->id}}"><label>Name:</label><br>
                <input class="in" type="text" value="{{ $req->name }}" disabled><br>
                <label>Email:</label><br>
                <input class="in" type="text" value="{{ $req->email }}" disabled><br>
                <label>Skype:</label><br>
                <input class="in" type="text" value="{{ $req->skype}}" disabled><br>
                <label>Telephone:</label><br>
                <input class="in" type="text" value="{{ $req->telephone}}" disabled><br>
                <label>Requirements:</label><br>
                <textarea class="in" disabled> {{ $req->Requirements }}</textarea>
            </form>
        </div>
        <div class="hidden">
            <form id="edit{{$req->id}}" method="post" action="/admin/quote/edite"><label>Name:</label><br>
                <input class="in" type="text" name="name" value="{{ $req->name }}" autocomplete="off"><br>
                <label>Email:</label><br>
                <input class="in" type="text" name="email" value="{{ $req->email }}" autocomplete="off"><br>
                <label>Skype:</label><br>
                <input class="in" type="text" name="skype" value="{{ $req->skype}}" autocomplete="off"><br>
                <label>Telephone:</label><br>
                <input class="in" type="text" name="telephone" value="{{ $req->telephone}}" autocomplete="off"><br>
                <label>Requirements:</label><br>
                <textarea class="in" name="Requirements" autocomplete="off"> {{ $req->Requirements }}</textarea><br>
                <input name="id" type="hidden" value="{{$req->id}}">
                {{ csrf_field() }}
                <input type="submit" value="Save">
            </form>
        </div>
    @endforeach
    @include('pages.navigation')
@endsection