<?php
namespace Modules\ACOPI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ACOPI\Entities\Cellar;

class CellarController extends Controller
{
    public function index() {                     

        $cellars = Cellar::all();
        return view('acopi::.cellar.index', compact('cellars'));
    }

    public function create() {
        return view('acopi::.cellar.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Cellar::create($request->all());
        return redirect()->route('acopi.admin.cellar.index')->with('success', 'Bodega creada exitosamente.');
    }

    public function edit($id) {
        $cellar = Cellar::findOrFail($id);
        return view('acopi::cellar.edit', compact('cellar'));

    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $cellar = Cellar::findOrFail($id);
    $cellar->update(['name' => $request->name]);

    return redirect()->route('acopi.admin.cellar.index')->with('success', 'Bodega actualizada correctamente');
}

public function destroy($id)
{
    $cellar = Cellar::findOrFail($id);
    $cellar->delete();

    return redirect()->route('acopi.admin.cellar.index')->with('success', 'Bodega eliminada correctamente');
}
}
