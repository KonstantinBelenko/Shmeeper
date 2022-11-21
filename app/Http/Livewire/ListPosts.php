<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Post;

class ListPosts extends Component
{
    public $posts;
    public $userPosts = null;
    public $commentPosts = null;
    public $limitPerPage;

    # This is id of the user posts of whom should
    # only be displayed if it is provided
    public $listOnlyUser = null;

    # If this variable is provided
    # posts will be filtered by reply_id
    public $listOnlyComments = null;

    public function mount()
    {
        # If the id of user is provided - filter out only his posts
        if ($this->listOnlyUser != null)
        {
            $this->userPosts = $this->posts->where('user_id', $this->listOnlyUser);
        }
        else if ($this->listOnlyComments != null)
        {
            $this->commentPosts = $this->posts->where('reply_id', $this->listOnlyComments);
        }
    }

    public function render()
    {
        # If the id of user is provided - filter out only his posts
        if ($this->listOnlyUser != null)
        {
            $this->paginatedPosts = $this->userPosts
                ->where('user_id', $this->listOnlyUser)
                ->forPage(0, $this->limitPerPage);
        }
        else if ($this->listOnlyComments != null)
        {
            $this->paginatedPosts = $this->commentPosts
                ->where('reply_id', $this->listOnlyComments)
                ->forPage(0, $this->limitPerPage);
        }
        else
        {
            $this->paginatedPosts = $this->posts->forPage(0, $this->limitPerPage);
        }


        return view('livewire.list-posts');
    }
}
