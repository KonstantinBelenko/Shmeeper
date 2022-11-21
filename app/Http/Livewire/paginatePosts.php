<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class paginatePosts extends Component
{
    public $posts;
    public $paginatedPosts;

    # This is id of the user posts of whom should
    # only be displayed if it is provided
    #
    # This variable is transferred to <livewire:list-posts>
    public $listOnlyUser = null;

    # If this variable is provided
    # posts will be filtered by reply_id
    #
    # This variable is transferred to <livewire:list-posts>
    public $listOnlyComments = null;

    public $limitPerPage = 5;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount()
    {
        $this->posts = Post::with('author', 'comments', 'likes')
            ->get()
            ->reverse();
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }

    public function render()
    {
        /* On scroll pagination of posts*/
        $this->paginatedPosts = $this->posts->slice(0, $this->limitPerPage);

        $this->emit('load-more-finished');

        return view('livewire.paginate-posts');
    }
}
