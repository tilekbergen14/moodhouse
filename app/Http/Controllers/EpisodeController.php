<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Show;
use App\Models\Episode;
use Illuminate\Support\Facades\File; 

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

    public function index(Request $request){
        $episodes = null;
        $show = null;
        $search = $request->show_id ?? null;
        if($search){
            $episodes = Episode::where("show_id", "=", "$search")->paginate(10);
        }else{
            $episodes = Episode::paginate(10);
        }
        $shows= Show::all();
        return view("admin.episodes", ["episodes" => $episodes,"shows" => $shows, "search" => $search]);
    }

    public function createep_get(Request $request){
        $episode =  null;
        if($request->id ){
            $episode = Episode::find($request->id );
        }
        $shows = Show::get();
        return view("admin.createepisode", ["episode" => $episode, "shows" => $shows]);
    }
    public function createep_post(Request $request){
        $videoPath = $request->existedvideo ?? null;
        $this->validate($request, [
            "show_id" => "required",
            "episode" => "required|integer",
        ]);
        if(!$videoPath){
            $this->validate($request, [
                "video" => "required|mimes:mp4",
            ]);
        }
        $show = Show::find($request->show_id);
        if(!$show){
            return back();
        }
        $id = $request->id;
        if ($request->video) {
            $this->validate($request, [
                'video' => 'required|mimes:mp4',
            ]);
            $videoName = time() . $request->video->getClientOriginalName();
            $request->video->move(public_path('videos/episodes'), $videoName);
            if($videoPath){
                File::delete(public_path($videoPath));
            }
            $videoPath = "/videos/episodes/" . $videoName;
        }
        if($id){
            $episode = Episode::find($id);
            $episode->show_id = $request->show_id;
            $episode->episode = $request->episode;
            $episode->video = $videoPath;
            $episode->update();
            return back();
        }
        $episode = Episode::create([
            'episode' => $request->episode,
            'video' => $videoPath,
            'show_id' => $request->show_id
        ]);
        return back();
    }
    public function delete(Request $request){
        $episode = Episode::find($request->id);
        $episode->delete();
        return back();
    }
}
