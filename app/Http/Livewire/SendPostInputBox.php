<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SendPostInputBox extends Component
{

    public $post_id;

    public function render()
    {
        return view('livewire.send-post-input-box');
    }
}
