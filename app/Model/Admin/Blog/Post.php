<?php

namespace Devmus\Model\Admin\Blog;

use Carbon\Carbon;
use Devmus\Model\Admin\Blog\Category;
use Devmus\Model\User\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Devmus\Model\Admin\Admin;

class Post extends Model
{
	// softDelete
	use SoftDeletes;

    protected $fillable =['title', 'slug','body','category_id','image','status','admin_id'];

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
    	return $this->belongsToMany('Devmus\Model\Admin\Blog\Tag','post_tags','post_id','tag_id')->withTimestamps();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    // Accessor
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    



}
