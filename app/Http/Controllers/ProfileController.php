<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $posts = Post::get();
        return view('profile.index', compact('user', 'posts'));
    }

    public function confirmPass(Request $request){
        $request->validate([
            'password' => 'required|string',
        ]);
    
        if (Hash::check($request->password, Auth::user()->password)) {
            return redirect()->route('profile.edit');
        } else {
            return redirect()->route('profile')->with('error', 'Password salah');
        }
    }

    public function edit(){
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
    
            $imagePath = $request->file('image')->store('postingan', 'public');
        } else {
            $imagePath = $user->image;
        }

        $user->image =  $imagePath;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route('profile');
    }
}
