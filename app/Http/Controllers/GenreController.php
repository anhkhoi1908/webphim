<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $list = Genre::all();
        return view('admin.genre.index', compact('list'));
    }

    public function create()
    {
        $list = Genre::all();
        return view('admin.genre.form', compact('list'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect()->back(); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $genre = Genre::find($id);
        $list = Genre::all();
        return view('admin.genre.form', compact('list', 'genre'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $genre = Genre::find($id);
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect()->back(); 
    }

    public function destroy($id)
    {
        Genre::find($id)->delete();
        return redirect()->back();
    }
}
