<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialMedia\StoreRequest;
use App\Http\Requests\SocialMedia\UpdateRequest;
use App\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:social_medias.index',
            'permission:social_medias.create',
            'permission:social_medias.store',
            'permission:social_medias.edit',
            'permission:social_medias.update',
            'permission:social_medias.destroy'
        ]);
    }
    public function index()
    {
        $social_medias = SocialMedia::get();
        return view('admin.social_media.index', compact('social_medias'));
    }
    public function create()
    {
        return view('admin.social_media.create');
    }
    public function store(StoreRequest $request, SocialMedia $social_media)
    {
        $social_media->my_store($request);
        return redirect()->route('social_medias.index')->with('toast_success', '¡Red socia creada con éxito!');
    }
    public function show(SocialMedia $social_media)
    {
        return view('admin.social_media.show', compact('social_media'));
    }
    public function edit(SocialMedia $social_media)
    {
        return view('admin.social_media.edit', compact('social_media'));
    }
    public function update(UpdateRequest $request, SocialMedia $social_media)
    {
        $social_media->my_update($request);
        return redirect()->route('social_medias.index')->with('toast_success', '¡Red socia actualizada con éxito!');
    }
    public function destroy(SocialMedia $social_media)
    {
        $social_media->delete();
        return redirect()->back()->with('toast_success', '¡Red socia eliminada con éxito!');
    }
}
