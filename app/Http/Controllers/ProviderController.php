<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:providers.index',
            'permission:providers.create',
            'permission:providers.store',
            'permission:providers.show',
            'permission:providers.edit',
            'permission:providers.update',
            'permission:providers.destroy'
        ]);
    }
    public function index()
    {
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }
    public function create()
    {
        return view('admin.provider.create');
    }
    public function store(StoreRequest $request)
    {
        Provider::create($request->all());
        return redirect()->route('providers.index')->with('toast_success', '¡Proveedor registrado con éxito!');
    }
    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }
    public function update(UpdateRequest $request, Provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index')->with('toast_success', '¡Proveedor actualizado con éxito!');
    }
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->back()->with('toast_success', '¡Proveedor eliminado con éxito!');
    }
}
