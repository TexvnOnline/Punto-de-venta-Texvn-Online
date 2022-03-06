<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;
use Illuminate\Http\Request;
use Throwable;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:brands.index',
            'permission:brands.create',
            'permission:brands.store',
            'permission:brands.edit',
            'permission:brands.update',
            'permission:brands.destroy',
        ]);
    }
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.create');
    }
    public function store(StoreRequest $request, Brand $brand)
    {
        $brand->my_store($request);
        return redirect()->route('brands.index')->with('toast_success', '¡Marca creada con éxito!');
    }
    // public function show(Brand $brand)
    // {
    //     return view('admin.brand.show', compact('brand'));
    // }
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }
    public function update(UpdateRequest $request, Brand $brand)
    {
        $brand->my_update($request);
        return redirect()->route('brands.index')->with('toast_success', '¡Marca actualizada con éxito!');
    }
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();
        } catch (Throwable $e) {
            // report($e);
            return redirect()->back()->with('toast_error', '¡La marca tiene productos asociados!');
        }
        return redirect()->back()->with('toast_success', '¡Marca eliminada con éxito!');
    }
}
