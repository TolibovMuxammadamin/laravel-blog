<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use App\Category;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        /* Algoritm:
         * Rasmni Storage ga Yuklash
         * Post yaratish
         * Post yaratilganligi to'grisida flash-message jo'natish
         * Foydalanuchini posts.index ga jo'natib yuborish
        */

        $image = $request->image->store('posts');

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
        ]);

        if($request->tags)
        {
            $post->tags()->attach($request->tags);
        }

        session()->flash('success', 'Post Created Successfully');

        return redirect( route('posts.index') );
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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only('title', 'description', 'content', 'published_at', 'category');
        
        // Rasmni bor yo'qligini tekshirish
        if($request->hasFile('image'))
        {
            // Rasmni yuklab olish
            $image = $request->image->store('posts');

            $post->deleteImage();

            $data['image'] = $image;
        }

        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }

        $post->update($data);

        session()->flash('success', 'Post Updated Successfully');

        return redirect( route('posts.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if($post->trashed())
        {   
            $post->deleteImage();
            $post->forceDelete();
            session()->flash('success', 'Post Deleted Successfully');
        } 
        else {
            $post->delete();
            session()->flash('success', 'Post Trashed Successfully');
        }

        return redirect( route('posts.index') );
    }

    /**
     * Display all trashed posts
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        
        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();    

        $post->restore();

        session()->flash('success', 'Post Restored Successfully');

        return redirect()->back();
    }
}
