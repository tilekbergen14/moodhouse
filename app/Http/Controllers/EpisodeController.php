<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Show;

class EpisodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            if(!Auth::user()->isadmin){
                return redirect()->route('home');
            }
            return $next($request);
        });
    }
    public function index(){
        $episode = null;
        return view("admin.episodes", ["episode" => $episode, "shows" => $shows]);
    }

    public function createep_get(){
        $episode = null;
        $shows = Show::get();
        return view("admin.createepisode", ["episode" => $episode, "shows" => $shows]);
    }
    public function createep_post(Request $request){
        $this->validate($request, [
            "show_id" => "required",
            "episode" => "required|integer",
            "video" => "required|mimes:mp4",
        ]);
        dd($request->video);
        return view("admin.createepisode", ["episode" => $episode]);
    }
}
