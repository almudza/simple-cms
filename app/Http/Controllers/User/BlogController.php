<?php

namespace Devmus\Http\Controllers\User;

use Devmus\Http\Controllers\Controller;
use Devmus\Model\Admin\Blog\Category;
use Devmus\Model\Admin\Blog\Post;
use Devmus\Model\Admin\Blog\Tag;
// use Devmus\Model\User\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

	// Blog list 
	public function list()
	{
		$posts = Post::orderBy('id','desc')->where('status', 1)->paginate(5);


        $zero = 'Post Not Yet';

		return view('front.blog.list',compact('posts' ,'zero'));

	}



    public function post($slug)
    {
    	// fetch from the DB based on slug  status publish
    	$post = Post::where('slug', '=', $slug)->where('status',1)->first();


    	return view('front.blog.post', compact('post'));
    }


    public function category(Category $category)
    {
        $posts = $category->posts();

        $zero = 'Post Not Yet';

        return view('front.blog.list',compact('posts' ,'zero'));
    }
    
    public function tag(Tag $tag)
    {
        $posts = $tag->posts();

        $zero = 'Post Not Yet';

        return view('front.blog.list',compact('posts' ,'zero'));
    }



}
