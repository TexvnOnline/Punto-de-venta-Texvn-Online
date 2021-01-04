<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printer;
use App\Http\Requests\Printer\UpdateRequest;

class PrinterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:printers.index')->only(['index']);
        $this->middleware('can:printers.edit')->only(['update']);
    }
    public function index(){
        $printer = Printer::where('id', 1)->firstOrFail();
        return view('admin.printer.index', compact('printer'));
    }
    public function update(UpdateRequest $request, Printer $printer)
    {
        $printer->update($request->all());
        return redirect()->route('printers.index');
    }
}
