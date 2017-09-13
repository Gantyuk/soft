@extends('layouts.master_c')


@section('request')
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/pages.css') }}">
    <script type="text/javascript" src="{{ url('ckeditor/ckeditor.js')}}"></script>
    @include('layouts.script')
    <style>
        #add_ew_btn, #add_ew_btn_1, .btn_max {
            width: 100%;
            margin-top: 35px;
            margin-bottom: 25px;
        }

        .cl_blok {

            vertical-align: bottom;
            padding: 12px;
        }

        .cl_blok img {
            max-width: 100%;
            max-height: 300px;
        }
        .cl_blok button{
            vertical-align: bottom;
        }

        .flex {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <button type="button" id="add_ew_btn" href="#new_project_form" class="btn btn-success">Add new</button>
                <div class="row flex">
                    @foreach($projects as $project )
                        <div class="col-md-4 cl_blok">
                            {!! $project->media!!}
                            <button type="button" style="margin-top: 10px;" id="add_ew_btn{{$project->id}}"
                                    href="#new_project_form{{$project->id}}" class="btn_max btn btn-warning">Edit
                            </button>
                            <div class="hidden">
                                <form id="new_project_form{{$project->id}}" method="post"
                                      action="/admin/project/save/{{$project->id}}">
                                        <textarea id="new_project{{$project->id}}" name="media">
                                            {{$project->media}}
                                        </textarea>
                                    <a type="button" style="margin-top: 10px"
                                            href="/admin/project/delete/{{$project->id}}" class=" btn btn-danger">Delete
                                        project
                                    </a>
                                    <input type="submit" style="margin-top: 10px" value="Save changes"
                                           class="btn btn-warning">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <script>
                            $("#add_ew_btn{{$project->id}}").fancybox({
                                titlePosition: 'inside',
                                transitionIn: 'none',
                                transitionOut: 'none',
                                height: 'auto',
                                width: 'auto',
                                afterLoad: function () {
                                    CKEDITOR.replace('new_project{{$project->id}}');
                                },
                                beforeClose: function () {
                                    CKEDITOR.instances.new_project{{$project->id}}.destroy();
                                }
                            });
                        </script>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="hidden">
        <form id="new_project_form" method="post" action="/admin/project/store">
            <textarea id="new_project" name="media">
            </textarea>
            <input type="submit" id="add_ew_btn_1" style="margin-bottom: 5px" value="Store" class="btn btn-success">
            {{ csrf_field() }}
        </form>
    </div>

    @include('pages.navigation')
@endsection