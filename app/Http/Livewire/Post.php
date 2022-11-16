<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{

    public $post;
    public $isLiked;
    public $counter;
    public $commnetCounter;
    public $owner;

    public function mount() {
        $this->counter = $this->post->likes->count();
        $this->isLiked = $this->post->likes->where('user_id', auth()->id())->first() != null;
    }

    public function like() {
        $direction = $this->post->flipLike();
        $this->counter += $direction;
        $this->isLiked = !$this->isLiked;
    }

    public function render()
    {
        return view('livewire.post');
    }
}
