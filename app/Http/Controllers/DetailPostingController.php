<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DetailPostingController extends Controller
{
    public function show($post_id){
        $post = Post::findOrFail($post_id);
        return view('detail.index', compact('post'));
    }
}
