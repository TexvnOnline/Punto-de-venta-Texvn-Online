<?php

namespace App\Http\Controllers;

use App\Product;
use App\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:promotions.index',
            'permission:promotions.create',
            'permission:promotions.store',
            'permission:promotions.edit',
            'permission:promotions.update',
            'permission:promotions.destroy'
        ]);
    }
    public function index()
    {
        $promotions = Promotion::get();
        return view('admin.promotion.index', compact('promotions'));
    }
    public function create()
    {
        $products = Product::store_products()->get();
        return view('admin.promotion.create', compact('products'));
    }
    public function store(Request $request, Promotion $promotion)
    {
        $promotion->my_store($request);
        return redirect()->route('promotions.index')->with('toast_success', '¡Promoción creada con éxito!');
    }
    public function show(Promotion $promotion)
    {
        return view('admin.promotion.show', compact('promotion'));
    }
    public function edit(Promotion $promotion)
    {
        $products = Product::store_products()->get();
        return view('admin.promotion.edit', compact('promotion','products'));
    }
    public function update(Request $request, Promotion $promotion)
    {
        $promotion->my_update($request);
        return redirect()->route('promotions.index')->with('toast_success', '¡Promoción actualizada con éxito!');
    }
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->back()->with('toast_success', '¡Promoción eliminada con éxito!');
    }
}
