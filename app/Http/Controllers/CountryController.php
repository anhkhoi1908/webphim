<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $list = Country::all();
        return view('admin.country.index', compact('list'));
    }

    public function create()
    {
        $list = Country::all();
        return view('admin.country.form', compact('list'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Country();
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        return redirect()->back(); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $country = Country::find($id);
        $list = Country::all();
        return view('admin.country.form', compact('list', 'country'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $country = Country::find($id);
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        return redirect()->back(); 
    }

    public function destroy($id)
    {
        Country::find($id)->delete();
        return redirect()->back();
    }
}
