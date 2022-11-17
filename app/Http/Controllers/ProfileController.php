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

        $user->update(['about' => $request->about]);
        $name = $request->username;
        if ($name == ''){
            return redirect('/profile/edit');
        }else {
            $user->update(['name' => $name]);
        }

        // If image is provided
        if ($request->hasFile('image')) {

            // Save image
            $original_filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $original_filename, 'public');

            // Delete old image if there is
            if ($user->avatar_url != '') {
                Storage::disk('public')->delete('images/'.$user->avatar_url);
            }

            $file_name  = $this->random_string(14);
            $file_extension = pathinfo('public/images/'.$original_filename, PATHINFO_EXTENSION);
            $new_file       = $file_name.'.'.$file_extension;

            Storage::disk('public')->move('images/'.$original_filename, 'images/'.$new_file);

            // Update avatar status
            $user->update(['avatar_url' => $new_file]);
            $user->update(['avatar_type' => 'image']);
        }

        return redirect('/profile');
    }

    function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }

}
