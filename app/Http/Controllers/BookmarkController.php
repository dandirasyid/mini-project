<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index(){
        $user = Auth::user();
        $bookmarks = $user->bookmarks;
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function store(Request $request, Post $post){
        $user = Auth::user();

        $bookmark = Bookmark::where('user_id', $user->id)
                            ->where('post_id', $post->id)
                            ->first();
        if ($bookmark) {
            $bookmark->delete();
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'post_id' => $post->id
            ]);
        }
        return back();
    }
}
