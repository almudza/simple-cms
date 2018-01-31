<?php

namespace App\Model\Admin\Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name','slug'];
    //
   public function posts()
   {
   		return $this->hasMany('App\Model\Admin\Blog\Post');
   }
}
