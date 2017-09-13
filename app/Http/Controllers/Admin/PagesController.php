<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Page;

use App\Category;

use Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        $categories = Category::all();
        return view('pages.pages', compact('pages', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.create-page', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'url'           => 'required',
            'category_id'   => 'required',
            'body'          => 'required'
        ]);
        $page = new Page;
        $page->name = $request['name'];
        $page->url = $request['url'];
        $page->category_id = $request['category_id'];
        $page->body = $request['body'];
        $page->save();
        Session::flash('success', 'New page created successfully.');
        return redirect()->route('adminpages.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $page = Page::find($id);
        return view('pages.edit', compact('page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'url'           => 'required',
            'category_id'   => 'required',
            'body'          => 'required'
        ]);
        $page = Page::find($id);
        $page->name = $request['name'];
        $page->url = $request['url'];
        $page->category_id = $request['category_id'];
        $page->body = $request['body'];
        $page->save();
        Session::flash('success', 'This page successfully saved.');
        return redirect()->route('adminpages.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        Session::flash('success', 'The page was successfully deleted.');
        return redirect()->route('adminpages.index');
    }

    public function search(Request $request)
    {
        if (isset($request['search_category'])) {
            $pages = Page::where('category_id', $request['search_category'])->get();
        } else {
            $pages = Page::where('name', 'like', '%' . request('search') . '%')->get();
        }
        $categories = Category::all();
        return view('pages.pages', compact('pages', 'categories'));
    }
}
