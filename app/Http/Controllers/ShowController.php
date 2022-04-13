<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function index(Show $show, Request $request){
        $ep = $request->ep ?? 1;
           try {
            if($show->episodes[$ep - 1]){
                return view("show.index", ["show" => $show, "ep" => $ep]);
             }
           } catch (\Throwable $th) {
                return view("show.index", ["show" => $show, "ep" => null]);
           }
    }
    public function delete(Request $request){
        Show::find($request->id)->delete();
        return back();
    }
}
