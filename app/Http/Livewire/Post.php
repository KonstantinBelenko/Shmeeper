<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{

    public $post;
    public $counter;
    public $owner;

    public function mount() {
        $this->counter = $this->post->likesCount();
    }

    public function like() {
        $direction = $this->post->flipLike();
        $this->counter += $direction;
    }

    public function render()
    {
        return view('livewire.post');
    }
}
