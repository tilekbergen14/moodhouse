<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Show;
use App\Models\Episode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $episodes = Episode::orderBy("created_at", "desc")->paginate(18);
        $genres = Genre::get();
        $shows = Show::get();
        return view("welcome", ["episodes" => $episodes, "genres" => $genres, "shows" => $shows]);
    }
    // public function indexpost(Request $request)
    // {
    //     $genres = $request->cgenres;
    //     if(!$genres){
    //         return back();
    //     }
    //     $shows = Show::query()
    //     ->whereLike('genres', $genres)
    //     ->get();
    //     return redirect()->back()->with('shows', $shows)->withInput();
    // }
}
