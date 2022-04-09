<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function index(Show $show, Request $request){
        return view("show.index", ["show" => $show]);
    }
    public function delete(Request $request){
        Show::find($request->id)->delete();
        return back();
    }
}
