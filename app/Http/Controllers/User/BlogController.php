<?php

namespace Devmus\Http\Controllers\User;

use Devmus\Http\Controllers\Controller;
use Devmus\Model\Admin\Blog\Category;
use Devmus\Model\Admin\Blog\Post;
use Devmus\Model\Admin\Blog\Tag;
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

        $zero = 'Post Not Yet';

		return view('user.blog.list',compact('posts' ,'zero'/*,'category', 'tags'*/));

	}



    public function post($slug)
    {
    	// fetch from the DB based on slug  status publish
    	$post = Post::where('slug', '=', $slug)->where('status',1)->first();



    	return view('user.blog.post', compact('post'));
    }
}
