<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostingController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('posting.index', compact('user'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'image' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('postingan', 'public');
        }

        $request->user()->posts()->create([
            'image' => $imagePath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('home');
    }
}
