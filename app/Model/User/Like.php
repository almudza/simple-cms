<?php

namespace Devmus\Model\User;

use Devmus\Model\Admin\Blog\Post;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post()
    {

    	return $this->belongsTo(Post::class,'like');
    }
}
