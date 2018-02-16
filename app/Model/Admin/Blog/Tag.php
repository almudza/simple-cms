<?php

namespace Devmus\Model\Admin\Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $fillable = ['name', 'slug'];


	// posts 
	public function posts()
	{
		return $this->belongsToMany('Devmus\Model\Admin\Blog\Post','post_tags','tag_id','post_id')->orderBy('created_at', 'DESC')->where('status',1)->paginate(5);
		
	}

	public function getRouteKeyName()
    {
    	return 'slug';
    }

   
}
