<?php

namespace Devmus\Model\Admin\Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name','slug'];
    //
   public function posts()
   {
   		return $this->hasMany('Devmus\Model\Admin\Blog\Post')->where('status',1)->orderBy('created_at', 'DESC')->paginate(5);
   }

   public function getRouteKeyName()
   {
   		return 'slug';
   }
}
