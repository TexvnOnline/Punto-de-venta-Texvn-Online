<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\PurchaseDetails;


use Barryvdh\DomPDF\Facade as PDF;


class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:purchases.index',
            'permission:purchases.create',
            'permission:purchases.store',
            'permission:purchases.show',
            'permission:purchases.pdf',
            'permission:upload.purchases',
            'permission:change.status.purchases',
        ]);
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();

        $products = Product::pos_products()->get();

        return view('admin.purchase.create', compact('providers','products'));
    }
    public function store(StoreRequest $request, Purchase $purchase)
    {
        $purchase->my_store($request);
        return redirect()->route('purchases.index')->with('toast_success', '¡Compra registrada con éxito!');
    }
    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }
    public function edit(Purchase $purchase)
    {
        // $providers = Provider::get();
        // return view('admin.purchase.edit', compact('purchase'));
    }
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }
    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
    }
    
    public function upload(Request $reques, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status == 'VALID') {
            $purchase->update(['status'=>'CANCELED']);
            return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $purchase->update(['status'=>'VALID']);
            return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } 
    }
}
