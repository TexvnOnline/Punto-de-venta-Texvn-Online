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
        $this->middleware('can:providers.create')->only(['create','store']);
        $this->middleware('can:providers.index')->only(['index']);
        $this->middleware('can:providers.edit')->only(['edit','update']);
        $this->middleware('can:providers.show')->only(['show']);
        $this->middleware('can:providers.destroy')->only(['destroy']);
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
        return redirect()->route('providers.index');
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
        return redirect()->route('providers.index');
    }
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
    }
}
