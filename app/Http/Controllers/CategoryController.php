<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Throwable;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:categories.index',
            'permission:categories.create',
            'permission:categories.store',
            'permission:categories.show',
            'permission:categories.edit',
            'permission:categories.update',
            'permission:categories.destroy'
        ]);
    }
    public function index()
    {
        $categories = Category::
        with('subcategories')
        ->where('category_type', 'PRODUCT')
        ->orWhere('category_type', 'POST')->simplePaginate(10);
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::where('category_type', 'PRODUCT')->get();
        return view('admin.category.create', compact('categories'));
    }
    public function store(StoreRequest $request, Category $category)
    {
        $type = $request->type;
        $category->my_store($request, $type);
        return redirect()->route('categories.index')->with('toast_success', '¡Categoría creada con éxito!');
    }
    public function show(Category $category)
    {
        $products = Product::whereHas('category', function ($query) use ($category) {
            $query->whereIn('categories.id', $category->descendantsAndSelf()->select('id')->getQuery());
        })->get();

        return view('admin.category.show', compact('category','products'));
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(UpdateRequest $request, Category $category)
    {
        $category->my_update($request);
        return redirect()->route('categories.index')->with('toast_success', '¡Categoría actualizada con éxito!');
    }
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (Throwable $e) {
            // report($e);
            return redirect()->back()->with('toast_error', '¡La categoría tiene productos asociados!');
        }
        return redirect()->route('categories.index')->with('toast_success', '¡Categoría eliminada con éxito!');
    }
}
