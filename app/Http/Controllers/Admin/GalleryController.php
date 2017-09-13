<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image as Gallary;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Gallary::orderBy('position')->get();
        return view('admin.gallery', ['image' => $image]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach ($request->image as $image) {
            $filename = time() . '.' . 'jpeg';
            $path = storage_path('app\public\gallery\\' . $filename);
            $width = Image::make($image->path())->width();
            $height = Image::make($image->path())->height();
            $height = ($height * 1000) / $width;
            Image::make($image->path())->resize(1000, $height)->save($path, 90);
            $image = Gallary::create([
                    'path' => "gallery/$filename",
                    'position' => "3"
                ]
            );
            $image->position = $image->id;
            $image->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function order(Request $request)
    {
        $gallery = Gallary::orderBy('id')->get();
        $order = $request->order;
        foreach ($gallery as $item) {
            $field= $item->find(array_shift($order));
            $field->position = $item->id;
            $field->save();
        }

        return Gallary::get(['id','position'])->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Gallary::destroy($id);
    }
}
