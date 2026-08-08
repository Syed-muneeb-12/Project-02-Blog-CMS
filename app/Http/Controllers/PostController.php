<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::select([
                'id',
                'title',
                'category_id',
                'user_id',
                'status',
                'created_at',
            ])
            ->with([
                'category:id,name',
                'user:id,name',
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::orderBy('name','asc')->get(['id', 'name']);
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
              'title' => 'required|string|min:5|max:255|unique:posts,title',
              'body' => 'required|string|min:10',
              'category_id' => 'required|exists:categories,id',
              'status' => 'required|in:draft,published'
        ]);
        Post::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title'], '-'),
            'body' => $validated['body'],
            'category_id' => $validated['category_id'],
            'status' => $validated['status']

       ]);
        return redirect()->route('posts.index')->with('session','Post Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
