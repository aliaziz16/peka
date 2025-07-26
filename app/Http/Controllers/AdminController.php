<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(6);
        return view('dashboard.admin', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.form-post', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'content' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.form-post', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $id,
            'content' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.dashboard')->with('success', 'Berita berhasil dihapus.');
    }
}
