<?php

namespace App\Model\Admin\Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $fillable = ['name', 'slug'];


	// posts 
	public function posts()
	{
		return $this->belongsToMany('App\Model\Admin\Blog\Post','post_tags','tag_id','post_id');
		
	}

   
}
