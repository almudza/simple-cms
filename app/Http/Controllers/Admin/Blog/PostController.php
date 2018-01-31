<?php

namespace App\Http\Controllers\Admin\Blog;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Model\Admin\Blog\Category;
use App\Model\Admin\Blog\Post;
use App\Model\Admin\Blog\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();

        $category = Category::find('posts');

        $tags = Tag::find('posts');

        // if ( isset($category)== 0) {
            
        //     $category = null;

        // } elseif ($tags->count() == 0) {

        //     return $tags = 'kosong';
            
        // }



        return view('admin.blog.post.index', compact('posts','category','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        // jika belum punya akan refirect ke category

        if ($categories->count() ==0 )
        {
            return redirect()->route('category.create');
            
        } else if ($tags->count() == 0) 
        {
            return redirect()->route('tag.create');
        }

        return view('admin.blog.post.create')->with('categories', $categories)
        ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        // $input = $request->all();

        $validator = Validator::make($request->all(),[
            'title' => 'required|max:225',
            'slug' => 'required',
            'image' => 'required|image',
            'body' => 'required',
            // 'category_id' => 'required',
            'tags' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect(route('post.create'))->withErrors($validator)->withInput();
        }

        $image = $request->image;

        // change uniq name
        $image_new_name = time().$image->getClientOriginalName();

        // move to public
        $image->move('media',$image_new_name);

        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => 'media/'. $image_new_name,
            'status' => $request->status,
            'body' => $request->body,
            'category_id' => $request->category_id,
            
        ]); 

       $post->tags()->sync($request->tags);


        /*$post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->title;
        // $category_id = $request->category_id;
        // $tag_id = $request->tag_id;
        $post->save();
       // $post->tags()->sync($request->tags);
        // $post->categories()->sync($request->categories);*/


        return redirect()->route('post.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('tags','category')->where('id',$id)->first();

        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.blog.post.edit')->with('post',$post)->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            // 'category_id' => 'required',
            'tags' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')) {
            
            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('media/', $image_new_name);

            $post->image = 'media/' . $image_new_name;
        }

        $post->title = $request->title;

        $post->slug = $request->slug;
        
        $post->body = $request->body;

        $post->status =$request->status;
        
        $post->category_id = $request->category_id;
        
        $post->tags()->sync($request->tags);
        
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back();
    }

    /*show trashed*/

    public function showTrash()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.blog.post.trash')->with('posts',$posts);
    }

    /*
    Permanent Delete Post

    */
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->tags()->detach();

        $post->forceDelete();


        return redirect()->back();

    }


    /*Restore from trashed*/
    public function restore($id)
    {

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        return redirect()->route('post.index');
    }




}
