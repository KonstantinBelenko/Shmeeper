<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class paginatePosts extends Component
{
    public $posts;
    public $owner_id = -1;

    public $limitPerPage = 5;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 5;
    }

    public function render()
    {
        if ($this->owner_id != -1){
            $this->posts = Post::with('author', 'comments')
                ->get()
                ->reverse()
                ->load('likes')
                ->where('user_id', $this->owner_id)
                ->forPage(0, $this->limitPerPage);
            $this->emit('postStore');
        }
        else{
            $this->posts = Post::with('author', 'comments')
                ->get()
                ->reverse()
                ->load('likes')
                ->forPage(0, $this->limitPerPage);
            $this->emit('postStore');
        }

        return view('livewire.paginate-posts');
    }
}
