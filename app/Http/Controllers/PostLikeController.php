<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['authenticate']);
    }

    public function store(Post $post, Request $request){
        if($post->likeBy($request->user())){
            return response(null, 409);
        }

        $post->likes()->create([    
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request){
        $post->likes()->where('user_id', $request->user()->id)->delete();

        return back();
    }
}
