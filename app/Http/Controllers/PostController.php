<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:posts.index',
            'permission:posts.store',
            'permission:posts.show',
            'permission:posts.edit',
            'permission:posts.update',
            'permission:posts.destroy'
        ]);
    }
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('admin.post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }
    public function store(Request $request, Post $post)
    {
        $post = $post->my_store($request);
        return redirect()->route('posts.edit', $post)->with('toast_warning', '¡Rellena el formulario para publicar el articulo!');
    }
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        $categories = Category::where('category_type', 'POST') ->get();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
    public function update(Request $request, Post $post)
    {
        $post->my_update($request);
        return redirect()->route('posts.index')->with('toast_success', '¡Publicación actualizada con éxito!');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('toast_success', '¡Publicación eliminada con éxito!');
    }
}
