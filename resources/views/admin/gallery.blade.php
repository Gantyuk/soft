@extends('layouts.master')


@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('css/gallary.css')}}">

    <ul class="gallery_show row flex-container wrap">

        @foreach($image as $item)
            <li class="col-lg-3 col-sm-4 col-xs-6 p-2 bd-highlight" img_id="{{$item->id}}"
                style="order: {{$item->position}}; margin-bottom: 15px"><a title="Image 1" href="#"><img
                            class="thumbnail img-responsive" src="{{asset("storage/".$item->path)}}"></a></li>
        @endforeach
    </ul>
    <div class="nav-divider"></div>
    <div class="gallery_block">
        <ul id="sortable">
            @foreach($image as $item)
                <li class="col-lg-1 col-sm-4 col-xs-6" img_id="{{$item->id}}" id="{{$item->id}}"><a title="Image 1"
                                                                                                    href="#"><img
                                class="thumbnail img-responsive" src="{{asset("storage/".$item->path)}}"></a></li>

            @endforeach

        </ul>

    </div>

    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h3 class="modal-title">Heading</h3>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class='btn btn-default delete' data-dismiss="modal">Delete</button>

                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <form style="margin-bottom: 150px" method="post" action="/admin/gallery" enctype="multipart/form-data">
        <div class="form-group">
            <input name="image[]" type="file" class="form-control" accept="image" multiple required>

        </div>
        {{csrf_field()}}
        <div class="form-group">
            <button type="submit" class=" btn col-md-12 btn-success form-control">Upload</button>

        </div>
    </form>

@endsection
@section('scripts')

   

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function delete_image(id) {
            $("div[img_id=" + id + "]").css("display", "none");
            $("li[img_id=" + id + "]").css("display", "none");
            $.ajax({
                method: "post",
                url: "/admin/gallery/" + id,
                data: {_method: "DELETE", _token: "{{csrf_token()}}"},
                success: function (result) {

                }
            });
        }
        $(document).ready(function () {
            $('.thumbnail').click(function () {
                $('.modal-body').empty();
                var title = $(this).parent('a').attr("title");
                $('.modal-title').html(title);
                $($(this).parents('li').html()).appendTo('.modal-body');
                var image_id = $(this).closest('li').attr('img_id');
                $('.delete').attr('onclick', "delete_image(" + image_id + ")");
                $('#myModal').modal({show: true});
            });
        });

        $(function () {
            $('#sortable').sortable({
                connectWith: '#listA',
                update: function (event, ui) {
                    var result = $(this).sortable('toArray');
                    console.log(result);

                    $.ajax({
                        url: "/admin/gallery/order",
                        data: {order: result},
                        success: function (result) {
                            for (var key in result) {
                                $("li[img_id=" + result[key].id + "]").css("order", result[key].position);
                                console.log(result[key].position);
                            }

                        },
                        dataType: "json"
                    });
                }
            });
            $("#sortable").disableSelection();

        });
    </script>


@endsection