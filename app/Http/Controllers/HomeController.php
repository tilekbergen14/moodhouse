<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Show;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $shows = Show::orderBy("created_at", "desc")->limit(12)->get();
        $genres = Genre::get();
        return view("welcome", ["shows" => $shows, "genres" => $genres]);
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
