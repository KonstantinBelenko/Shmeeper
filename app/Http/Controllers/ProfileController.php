<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function owner()
    {
        $user = auth()->user();
        $posts = Post::with('likes', 'author', 'comments')->get();
        $userPosts = $posts->where('user_id', $user->id);

        return view('profile',[
            'owner' => true,
            'user' => $user,
            'posts' => $posts,
            'userPosts' => $userPosts,
        ]);
    }

    public function index($id)
    {
        $user = User::all()->where('id', '=', $id)->first();
        $posts = Post::with('likes', 'author', 'comments')->get();
        $userPosts = $posts->where('user_id', $user->id);

        return view('profile',[
            'owner' => false,
            'user' => $user,
            'posts' => $posts,
            'userPosts' => $userPosts,
        ]);
    }

    public function edit()
    {
        $user = auth()->user();

        return view('edit', [
            'user' => $user,
        ]);
    }

    public function save(Request $request) {

        $user = auth()->user();

        // Update user about
        $user->update(['about' => $request->about]);

        // Update user username
        $name = $request->username;
        if ($name == ''){
            return redirect('/profile/edit');
        }else {
            $user->update(['name' => $name]);
        }

        // If image is provided - Update user image
        if ($request->hasFile('image')) {

            // Save image
            $original_filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $original_filename, 'public');

            $file_name  = $this->random_string(14);
            $file_extension = pathinfo('public/images/'.$original_filename, PATHINFO_EXTENSION);
            $new_file       = $file_name.'.'.$file_extension;

            // Check for a correct filetype
            if (
                $file_extension == "png" ||
                $file_extension == "jpg" ||
                $file_extension == "jpeg" ||
                $file_extension == "gif" ||
                $file_extension == "jfif"
            )
            {
                // Delete old image if there is
                if ($user->avatar_url != '') {
                    Storage::disk('public')->delete('images/'.$user->avatar_url);
                }

                // Rename image to a random string
                Storage::disk('public')->move('images/'.$original_filename, 'images/'.$new_file);

                // Resize the new image to cropped 300x300 in center
                $img = Image::make('storage/images/'.$new_file);
                $img->fit(300, 300, function ($constraint) {
                    $constraint->upsize();
                });
                $img->save('storage/images/'.$new_file);

                // Update avatar status
                $user->update(['avatar_url' => $new_file]);
                $user->update(['avatar_type' => 'image']);
            }
            else // Delete the saved image and get back to the profile
            {
                Storage::disk('public')->delete('images/'.$original_filename, 'images/'.$new_file);
                return redirect('/profile/edit');
            }
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
