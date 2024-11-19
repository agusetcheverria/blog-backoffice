<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->latest()->paginate(10);
        return view('indexPosts', ['posts' => $posts]);
    }

    public function create()
    {
        return view('createPosts');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:users,id',
        ]);

        Post::create($validated);
        return redirect()->route('posts.index')->with('success', 'Post creado exitosamente.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('editPosts', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);
        return redirect()->route('posts.index')->with('success', 'Post actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado exitosamente.');
    }
}
