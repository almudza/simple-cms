<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Admin\Blog\Category;
use App\Model\Admin\Blog\Post;
use App\Model\Admin\Blog\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{

	// Blog list 
	public function list()
	{
		$posts = Post::orderBy('id','desc')->where('status', 1)->paginate(5);
		/*
		$category = Category::find('posts');

        $tags = Tag::find('posts');*/

		return view('user.blog.list',compact('posts'/*,'category', 'tags'*/));

	}



    public function post($slug)
    {
    	// fetch from the DB based on slug  status publish
    	$post = Post::where('slug', '=', $slug)->where('status',1)->first();



    	return view('user.blog.post', compact('post'));
    }
}
