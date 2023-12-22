<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Notifications\PostCreated;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Cache::pull('posts');
        $posts = Post::paginate(6);
        // $posts = Post::latest()->get();
        $posts = Cache::remember('posts', now()->addSeconds(30), function () {
            return Post::latest()->get();
        });

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_content' => 'required',
            'content' => 'required',
        ]);


        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            // 'photo' => null
        ]);

    if(isset($request->tags)){
        foreach ($request->tags as $tag) {
            $post->tags()->attach($tag);
        }
    }


     auth()->user()->notify(new PostCreated($post));

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post'=> $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(5),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show',['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
