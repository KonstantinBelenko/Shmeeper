<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{

    public $post;
    public $posts;

    public $commentCounter;
    public $likeCounter;

    public $isLiked;
    public $owner;

    public function mount() {
        $this->likeCounter = $this->post->likes->count();
        $this->commentCounter = $this->posts->where('reply_id', $this->post->id)->count();

        $this->isLiked = $this->post->likes->where('user_id', auth()->id())->first() != null;
    }

    public function like() {
        $direction = $this->post->flipLike();
        $this->likeCounter += $direction;
        $this->isLiked = !$this->isLiked;
    }

    public function render()
    {
        return view('livewire.post');
    }
}
