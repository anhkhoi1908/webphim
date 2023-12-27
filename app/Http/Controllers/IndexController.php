<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Episode;
use Nette\Utils\Random;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function home() {
        $hot = Movie::where('hot', 1)->where('status', 1)->get();
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $category_home = Category::with('movie')->orderBy('id', 'ASC')->where('status', 1)->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'hot'));
    }
    public function category(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->paginate(1);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie'));
    }
    public function country(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->paginate(40);
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie'));
    }
    public function genre(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $movie = Movie::where('genre_id', $genre_slug->id)->paginate(40);
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie'));
    }
    public function movie(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category', 'country', 'genre')->where('slug',$slug)->where('status', 1)->first();
        $related = Movie::with('category', 'country', 'genre')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'related'));
    }
    public function watch(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view('pages.watch', compact('category', 'genre', 'country'));
    }
    public function episode(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view('pages.episode', compact('category', 'genre', 'country'));
    }
}
