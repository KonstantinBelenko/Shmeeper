<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function owner()
    {
        $user = auth()->user();
        $posts = $user->posts();

        return view('profile',[
            'owner' => true,
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function index($id)
    {
        $user = User::all()->where('id', '=', $id)->first();
        $posts = $user->posts();

        return view('profile',[
            'owner' => false,
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function edit()
    {
        $user = auth()->user();
        $posts = $user->posts();

        return view('edit', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function save(Request $request) {

        $user = auth()->user();

        $name = $request->username;
        if ($name == ''){
            return redirect('/profile/edit');
        }else {
            $user->update(['name' => $name]);
        }

        // If image is provided
        if ($request->hasFile('image')) {

            // Save image
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');

            // Delete old image if there is
            if ($user->avatar_url != '') {
                Storage::disk('public')->delete('images/'.$user->avatar_url);
            }

            // Update avatar status
            $user->update(['avatar_url' => $filename]);
            $user->update(['avatar_type' => 'image']);


        }

        return redirect('/profile');
    }
}
