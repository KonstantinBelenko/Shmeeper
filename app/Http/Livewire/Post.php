<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{

    # These are provided
    public $post;
    public $posts;
    public $owner;

    # These are generat
    public $originalPost = null;
    public $commentCounter;
    public $likeCounter;
    public $isLiked;

    public function mount() {
        $this->likeCounter = $this->post->likes->count();
        $this->commentCounter = $this->posts->where('reply_id', $this->post->id)->count();

        $this->isLiked = $this->post->likes->where('user_id', auth()->id())->first() != null;

        if ($this->post->is_reply)
        {
            $this->originalPost = $this->posts->where('id', $this->post->reply_id)->first();
        }else{
            $this->originalPost = null;
        }
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
