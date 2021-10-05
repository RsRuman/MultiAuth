<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request){
        $slug = Str::slug($request->title, '-');
        $request->validate([
            'title' => 'required|unique:posts|min:10|max:50',
            'category' => 'required',
            'thumbnail' => 'required',
            'body' => 'required|min:200|max:3000',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'thumbnail' =>  $request->file('thumbnail')->store('thumbnail'),
            'body' => $request->body,
            'status' => 'deactivate',
        ]);

        return redirect(route('dashboard.createPost'))->with('success', 'Post created successfully!');
    }
}
