<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use PhpParser\Node\Expr\AssignOp\Mod;
use PhpParser\Node\Stmt\Catch_;
use Illuminate\Support\Carbon;

class MovieController extends Controller
{
    public function index()
    {
        $list = Movie::with('category', 'genre', 'country')->orderBy('id', 'DESC')->get();
        return view('admin.movie.index', compact('list'));
    }

    public function update_year(Request $request) {
        $data = $request->all();
        $movie = Movie::find($data['id_movie']);
        $movie->year = $data['year'];
        $movie->save();
    }

    public function update_topview(Request $request) {
        $data = $request->all();
        $movie = Movie::find($data['id_movie']);
        $movie->topview = $data['topview'];
        $movie->save();
    }

    public function filter_topview(Request $request) {
        $data = $request->all();
        $movie = Movie::where('topview',$data['value'])->orderBy('update_date', 'DESC')->take(20)->get();
        $output = '';
        foreach($movie as $key => $mov) {
            if($mov->resolution==0) {
            $text='HD';
            } elseif($mov->resolution==1) { 
               $text='SD';
            } elseif($mov->resolution==2) {
               $text='HDCam';
            } elseif($mov->resolution==3) {
               $text='Cam';
            } elseif($mov->resolution==4) {
               $text='FullHD';
            };
            $output.= '<div class="item post-37176">
            <a href="'.url('movie/'.$mov->slug).'" title="'.$mov->title.'">
               <div class="mov-link">
                  <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                  <span class="is_trailer">
                     '.$text.'
                  </span>
               </div>
               <p class="title">'.$mov->title.'</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
               <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
               <span style="width: 0%"></span>
               </span>
            </div>
            </div>';
        };
        echo $output;
    }

    public function filter_default(Request $request) {
        $data = $request->all();
        $movie = Movie::where('topview',0)->orderBy('update_date', 'DESC')->take(20)->get();
        $output = '';
        foreach($movie as $key => $mov) {
            if($mov->resolution==0) {
            $text='HD';
            } elseif($mov->resolution==1) { 
               $text='SD';
            } elseif($mov->resolution==2) {
               $text='HDCam';
            } elseif($mov->resolution==3) {
               $text='Cam';
            } elseif($mov->resolution==4) {
               $text='FullHD';
            };
            $output.= '<div class="item post-37176">
            <a href="'.url('movie/'.$mov->slug).'" title="'.$mov->title.'">
               <div class="mov-link">
                  <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                  <span class="is_trailer">
                     '.$text.'
                  </span>
               </div>
               <p class="title">'.$mov->title.'</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
            <div style="float: left;">
               <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
               <span style="width: 0%"></span>
               </span>
            </div>
            </div>';
        };
        echo $output;
    }



    public function create()
    {
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list = Movie::with('category', 'genre', 'country')->orderBy('id', 'DESC')->get();
        return view('admin.movie.form', compact('list', 'category', 'genre', 'country'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->resolution = $data['resolution'];
        $movie->subtitle = $data['subtitle'];
        $movie->time = $data['time'];
        $movie->hot = $data['hot'];
        $movie->tags = $data['tags'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->create_date = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->update_date = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie' ,$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list = Movie::with('category', 'genre', 'country')->orderBy('id', 'DESC')->get();
        $movie = Movie::find($id);
        return view('admin.movie.form', compact('list', 'category', 'genre', 'country', 'movie'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->resolution = $data['resolution'];
        $movie->subtitle = $data['subtitle'];
        $movie->time = $data['time'];
        $movie->tags = $data['tags'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->genre_id = $data['genre_id'];
        $movie->update_date = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');

        if($get_image) {
            if(file_exists('uploads/movie/'.$movie->image)) {
                unlink('uploads/movie/' .$movie->image);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/movie' ,$new_image);
                $movie->image = $new_image;
            }
        }
        $movie->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image)) {
            unlink('uploads/movie/' .$movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
