<?php

namespace Devmus\Http\Controllers\Admin\Blog;

use Devmus\Http\Controllers\Controller;
use Devmus\Model\Admin\Blog\Category;
use Devmus\Model\Admin\Blog\Post;
use Devmus\Model\Admin\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Storage;
use Validator;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



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


        return view('admin.blog.post.index', compact('posts','category','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {

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

        return redirect()->route('admin.dashboard');

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
            'slug' => 'required|alpha_dash|min:5|max:225|unique:posts,slug',
            'image' => 'required|image',
            'body' => 'required',
            // 'category_id' => 'required',
            'tags' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect(route('post.create'))->withErrors($validator)->withInput();
        }

        $image = $request->file('image');

        $slug = $request->slug;
        
        // change uniq name
        // $random = rand(1,9999);

        // $image_new_name = time().$slug . $random . '.'. $image->getClientOriginalExtension();

        // $saveImage = $image->storeAs('media', $image_new_name);
        

        $saveImage = $image->store('thumbnail');



        $post = Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'image' => $saveImage,
            'status' => $request->status,
            'body' => $request->body,
            'category_id' => $request->category_id,
            
        ]); 

       $post->tags()->sync($request->tags);


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

        // Validati data 
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug) {
            
            $this->validate($request,[
                'title' => 'required',
                
                'body' => 'required',
                // 'category_id' => 'required',
                'tags' => 'required'
            ]);
        } else {
            
            $this->validate($request,[
                'title' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required',
                // 'category_id' => 'required',
                'tags' => 'required'
            ]);
        }

        // post dengan gambar
        $postImage = $post->image;

        // tmpung gmbr baru
        $image = $request->file('image');

        // jika ada file request baru mk hapus yg lama
        if ($image) {

            // delete file
            // dd($postImage);
            
            Storage::delete($postImage);
        }


        // inisialisasi slug
        $slug = $request->slug;
            
            // change uniq name
        // $random = rand(1,9999);

        // $image_new_name = time().$slug . $random . '.'. $image->getClientOriginalExtension();
       

       // jika ada file baru simpan ke database dan storage
        if ($image) {
            
            $saveImage = $image->store('thumbnail');
            
            $post->image = $saveImage;
        
        }


        


        $post->title = $request->title;


        $post->slug = $slug;
        
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

        // jika punya gambar thumbnal mk hapus
        if ($post->image) {
            
            Storage::delete($post->image);
        }


        return redirect()->back();

    }


    /*Restore from trashed*/
    public function restore($id)
    {

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        return redirect()->route('post.index');
    }



    // Delete Thumbnail post edit 
    public function deleteThumb(Request $request, $id)
    {

        $post = Post::find($id);
        // post dengan gambar
        $postImage = $post->image;

        Storage::delete($postImage);

        $post->image = null;
        $post->save();
   
        return redirect()->back();

    }




}
