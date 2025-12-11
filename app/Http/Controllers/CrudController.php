<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $cruds = Crud::paginate(10);
        return view('cruds.index', compact('cruds'));
    }

    public function create()
    {
        return view('cruds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'nullable'
        ]);

        Crud::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('cruds.index')->with('status','Created Successfully!');
    }

    public function show(Crud $crud)
    {
        return view('cruds.show', compact('crud'));
    }

    public function edit(Crud $crud)
    {
        return view('cruds.edit', compact('crud'));
    }

    public function update(Request $request, Crud $crud)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'nullable'
        ]);

        $crud->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('cruds.index')->with('status','Updated Successfully!');
    }

    public function destroy(Crud $crud)
    {
        $crud->delete();
        return redirect()->route('cruds.index')->with('status','Deleted Successfully!');
    }
}
