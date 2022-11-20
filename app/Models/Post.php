<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes() {
        return $this->hasMany(Like::class, 'post_id');
    }

    public function comments() {
        return $this->hasMany(Post::class, 'reply_id');
    }

    public function isLiked() {
        $user_id = auth()->id();
        return Like::all()
                ->where('post_id', '=', $this->id)
                ->where('user_id', '=', $user_id)
                ->first() !== null;
    }

    public function removeLike() {
        if ($this->isLiked()) {

            $user_id = auth()->id();
            Like::all()
                ->where('post_id', '=', $this->id)
                ->where('user_id', '=', $user_id)
                ->first()->delete();
        }
    }

    public function addLike() {
        if (!$this->isLiked()) {
            $user_id = auth()->id();
            Like::factory(1)->create([
                'user_id' => $user_id,
                'post_id' => $this->id
            ]);
        }
    }

    public function replyingTo() {
        // Returns original post

        return Post::all()
            ->where('id', '=', $this->reply_id)
            ->first();

    }

    public function flipLike() {
        if ($this->isLiked()){
            $this->removeLike();
            return -1;
        }else{
            $this->addLike();
            return 1;
        }
    }
}
