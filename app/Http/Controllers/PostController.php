<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function create(Request $request){
        $req = $request->validate([
            'title' =>'required',
            'content' => 'required',
            'website' => 'required'
        ]);

        $mod = new Post();
        $mod->title = $request->title;
        $mod->content = $request->content;
        $mod->website_id =$request->website;
        try {
            $mod->save();
            return $mod;
        } catch (\Throwable $th) {
            return response()->json(['status'=>0,'msg'=>
            'Unable to create Post!']);
        }

    }

    public function list(){
        return Post::where('status','is',true)->get();
    }
}
