<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Post;

class ListPosts extends Component
{
    public $posts;
    public $paginatedPosts;

    # This is id of the user posts of whom should
    # only be displayed if it is provided
    public $listOnlyUser = null;

    public function mount()
    {
        # If the id of user is provided - filter out only his posts
        if ($this->listOnlyUser != null) {
            $this->paginatedPosts = Post::with('author', 'comments', 'likes')
                ->get()
                ->reverse()
                ->where('user_id', $this->listOnlyUser);
        }
    }

    public function render()
    {
        return view('livewire.list-posts');
    }
}
