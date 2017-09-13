<?php

namespace App\Http\Controllers\Admin;

use App\project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgectsControllers extends Controller
{
    public function index()
    {
        $projects = project::all();
        return view('admin.project', compact('projects'));
    }

    public function store(Request $request)
    {
        $project = new project();
        $project->fill($request->all());
        $project->save();

        return redirect('/admin/project');

    }

    public function save(project $id, Request $request)
    {
        $id->fill($request->all());
        $id->save();
        return redirect('/admin/project');
    }
}
