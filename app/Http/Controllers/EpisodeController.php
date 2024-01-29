<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class EpisodeController extends Controller
{

    public function index()
    {
       
    }

    public function create()
    {
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id');
        return view('admin.episode.form', compact('list_movie'));
    }

    public function store(Request $request)
    {
       
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
        
    }

    public function select_movie()
    {
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output='<option>---Chọn tập phim---</option>';
        for($i=1;$i<=$movie->eps;$i++) {
            $output.= '<option value="'.$i.'">'.$i.'</option>';
        }
        echo $output;
    }
}