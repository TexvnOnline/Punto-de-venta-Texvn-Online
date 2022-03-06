<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Tag;
use Illuminate\Http\Request;
class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:tags.index',
            'permission:tags.create',
            'permission:tags.store',
            'permission:tags.edit',
            'permission:tags.update',
            'permission:tags.destroy',
        ]);
    }
    public function index()
    {
        $tags = Tag::get();
        return view('admin.tag.index', compact('tags'));
    }
    public function create()
    {
        return view('admin.tag.create');
    }
    public function store(StoreRequest $request, Tag $tag)
    {
        $tag->my_store($request);
        return redirect()->route('tags.index')->with('toast_success', '¡Etiqueta creada con éxito!');
    }
    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->my_update($request);
        return redirect()->route('tags.index')->with('toast_success', '¡Etiqueta actualizada con éxito!');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with('toast_success', '¡Etiqueta eliminada con éxito!');
    }
}
