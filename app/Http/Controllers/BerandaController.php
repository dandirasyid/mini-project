<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller {
    public function home() {
        if (Auth::check()) {
            $followings = Auth::user()->followings()->pluck('id')->toArray();
            $users = User::whereNotIn('id', $followings)->where('id', '!=', Auth::id())->get();
            $posts = Post::orderBy('created_at', 'desc')->get();
            $user = Auth::user();
        } else {
            $users = User::all();
            $posts = Post::orderBy('created_at', 'desc')->get();
            $user = null;
        }
    
        $postId = null;
        if (Auth::check()) {
            $postId = Auth::id();
        }
        
        return view('beranda.home', compact('users', 'user', 'posts', 'postId'));
    }
    

    public function homeFollowing() {
        if (Auth::check()) {
            $user = Auth::user();
            $followings = $user->followings()->pluck('id')->toArray();
            $users = User::whereNotIn('id', $followings)->where('id', '!=', $user->id)->get();
            $posts = $user->followings()->with('posts')->get()->pluck('posts')->flatten()->sortByDesc('created_at');
        } else {
            $users = User::all();
            $posts = Post::orderBy('created_at', 'desc')->get();
        }
        
        return view('beranda.following', compact('users', 'posts'));
    }
}
