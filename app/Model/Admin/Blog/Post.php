<?php

namespace App\Model\Admin\Blog;

use App\Model\Admin\Blog\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	// softDelete
	use SoftDeletes;

    protected $fillable =['title', 'slug','body','category_id','image','status'];



    // get Image Gambar 
    public function getImageAttribute($image)
    {
        if (!$image) {
            
            return asset("media/devmus.png");
        }

        return asset($image);

    }


	protected $dates = ['deletad_at']; //soft delete

    // category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }


    // tags 
    public function tags()
    {
    	return $this->belongsToMany('App\Model\Admin\Blog\Tag','post_tags','post_id','tag_id')->withTimestamps();
    }
}
