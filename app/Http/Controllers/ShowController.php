<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
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

    public function index(Show $show, Request $request){
        return view("show.index", ["show" => $show]);
    }
    public function delete(Request $request){
        Show::find($request->id)->delete();
        return back();
    }
}
