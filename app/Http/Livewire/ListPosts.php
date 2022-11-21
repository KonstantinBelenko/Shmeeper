<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Post;

class ListPosts extends Component
{
    public $posts;
    public $userPosts = null;
    public $limitPerPage;

    # This is id of the user posts of whom should
    # only be displayed if it is provided
    public $listOnlyUser = null;

    public function mount()
    {
        # If the id of user is provided - filter out only his posts
        if ($this->listOnlyUser != null) {
            $this->userPosts = $this->posts->where('user_id', $this->listOnlyUser);
        }
    }

    public function render()
    {
        # If the id of user is provided - filter out only his posts
        if ($this->listOnlyUser != null) {
            $this->paginatedPosts = $this->userPosts
                ->where('user_id', $this->listOnlyUser)
                ->forPage(0, $this->limitPerPage);
        }else{
            $this->paginatedPosts = $this->posts->forPage(0, $this->limitPerPage);
        }


        return view('livewire.list-posts');
    }
}
