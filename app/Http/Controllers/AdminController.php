<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use SebastianBergmann\Environment\Console;

class AdminController extends Controller
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
    public function users(Request $request)
    {
        $users = null;
        $search = $request->search ?? null;
        if($search){
            $users = User::query()->where('name', 'like', "%$request->search%")->paginate(10);
        }else{
            $users = User::paginate(10);
        }
        return view('admin.users', ["users" => $users, "search" => $search]);
    }

    public function shows(Request $request)
    {
        $shows = null;
        $search = $request->search ?? null;
        if($search){
            $shows = Show::query()->where('name', 'like', "%$request->search%")->paginate(10);
        }else{
            $shows = Show::paginate(10);
        }
       
        return view('admin.shows', ["shows" => $shows, "search" => $search]);
    }
    public function createshowpost(Request $request)
    {
        $this->validate($request, [
            'name' => "required|max:255",
        ]);
        $imagePath = $request->existedImage ?? null;
        if ($request->image) {
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg|max:3072',
            ]);
            $imageName = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/thumbnails'), $imageName);
            if($imagePath){
                File::delete(public_path($imagePath));
            }
            $imagePath = "/images/thumbnails/" . $imageName;
        }
        $show = Show::find($request->id);
        if($show){
            $request->name !== $show->name && $show->name = $request->name;
            $request->description !== $show->description &&  $show->description = $request->description;
            $request->released_year !== $show->released_year &&  $show->released_year = $request->released_year;
            $request->genres !== $show->genres &&  $show->genres = $request->genres;
            $request->country !== $show->country &&  $show->country = $request->country;
            $request->type !== $show->type && $show->type = $request->type;
            $request->version !== $show->version &&  $show->version = $request->version;
            $imagePath !== $show->image && $show->image = $imagePath;
            $request->status !== $show->status &&  $show->status = $request->status;
            $show->update();
            return redirect()->route("admin-shows");
        }
        Show::create([
            'name' => $request->name,
            'description' => $request->description,
            'released_year' => $request->released_year,
            'genres' => $request->genres,
            'country' => $request->country,
            'type' => $request->type,
            'version' => $request->version,
            'image' => $imagePath,
            'status' => $request->status,
        ]);
        return back();
    }
    
    public function createshowget(Request $request)
    {
        $genres = Genre::get();
        $show = null;
        if($request->id){
            $show = Show::find($request->id);
        }
        return view('admin.createshow', ["genres" => $genres, "show" => $show]);
    }
    public function deleteUser(User $user){
        $user->delete();
        return back();
    }
    public function makeAdmin(User $user){
        if( !$user->isadmin){
            $user->isadmin = true;
        }else{
            $user->isadmin = false;
        }
        $user->save();
        return back();
    }
}
