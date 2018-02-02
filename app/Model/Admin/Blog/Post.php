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

    // helper image Backend
    public function getAdminImage()
    {

        return asset('media/' . $this->image);

    }

    // helper image front
    public function getImage()
    {
        if (!$this->image) {

            return asset('media/photo1.png');
            
        }

        return asset('media/' . $this->image);
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



    // view slug post detail
  /*  public function getRouteKeyName()
    {
        return 'slug';
    }*/
}
