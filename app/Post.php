<?php

namespace App;

use App\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
      $this->comments()->create(compact('body'));
    }
}
