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
        $hot = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->get();
        $hot_sidebar = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->take(20)->get();
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $category_home = Category::with('movie')->orderBy('id', 'ASC')->where('status', 1)->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'hot', 'hot_sidebar'));
    }
    public function category(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('update_date', 'DESC')->paginate(1);
        $hot_sidebar = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->take(20)->get();
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'hot_sidebar'));
    }
    public function year($year) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('update_date', 'DESC')->paginate(1);
        $hot_sidebar = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->take(20)->get();
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'hot_sidebar'));
    }
    public function tag($tag) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE', '%'.$tag.'%')->orderBy('update_date', 'DESC')->paginate(1);
        $hot_sidebar = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->take(20)->get();
        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'hot_sidebar'));
    }
    public function country(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->orderBy('update_date', 'DESC')->paginate(40);
        $hot_sidebar = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->take(20)->get();
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'hot_sidebar'));
    }
    public function genre(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $movie = Movie::where('genre_id', $genre_slug->id)->orderBy('update_date', 'DESC')->paginate(40);
        $hot_sidebar = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->take(20)->get();
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'hot_sidebar'));
    }
    public function movie(Request $request, $slug) {
        $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category', 'country', 'genre')->where('slug',$slug)->where('status', 1)->first();
        $related = Movie::with('category', 'country', 'genre')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $hot_sidebar = Movie::where('hot', 1)->where('status', 1)->orderBy('update_date', 'DESC')->take(20)->get();
        return view('pages.movie', compact('category', 'genre', 'country', 'movie', 'related', 'hot_sidebar'));
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
