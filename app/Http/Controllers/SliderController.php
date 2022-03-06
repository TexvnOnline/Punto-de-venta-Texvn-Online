<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:sliders.index',
            'permission:sliders.store',
            'permission:sliders.edit',
            'permission:sliders.update',
            'permission:sliders.destroy'
        ]);
    }
    public function index()
    {
        $sliders = Slider::with('image')->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(Request $request, Slider $slider)
    {
        $slider->my_store($request);
        return redirect()->route('sliders.index')->with('toast_success', '¡Slider creado con éxito!');
    }
    public function show(Slider $slider)
    {
        return view('admin.slider.show', compact('slider'));
    }
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, Slider $slider)
    {
        $slider->my_update($request);
        return redirect()->route('sliders.index')->with('toast_success', '¡Slider actualizado con éxito!');
    }
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with('toast_success', '¡Slider eliminada con éxito!');
    }
}
