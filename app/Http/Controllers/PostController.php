<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::with('author')->latest()->paginate(10);
            return view('backoffice.posts.index', ['posts' => $posts]);
        } catch (\Exception $e) {
            return redirect()->route('backoffice.posts.index')->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('backoffice.posts.create');
        } catch (\Exception $e) {
            return redirect()->route('backoffice.posts.index')->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'author_id' => 'required|exists:users,id',
            ]);

            Post::create($validated);
            return redirect()->route('backoffice.posts.index')->with('success', 'Post creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('backoffice.posts.create')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $post = Post::findOrFail($id);
            return view('backoffice.posts.edit', ['post' => $post]);
        } catch (\Exception $e) {
            return redirect()->route('backoffice.posts.index')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            $post = Post::findOrFail($id);
            $post->update($validated);
            return redirect()->route('backoffice.posts.index')->with('success', 'Post actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('backoffice.posts.edit', ['id' => $id])->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            return redirect()->route('backoffice.posts.index')->with('success', 'Post eliminado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('backoffice.posts.index')->with('error', $e->getMessage());
        }
    }
}
