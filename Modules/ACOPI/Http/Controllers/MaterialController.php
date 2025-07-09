<?php

namespace Modules\ACOPI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ACOPI\Entities\Material;
use Modules\ACOPI\Entities\Classification;
use Modules\ACOPI\Entities\Cellar;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        $cellars = Cellar::all();
        $classifications = Classification::all();

        return view('acopi::admin.index', compact('materials', 'cellars', 'classifications'));
    }

    public function create()
    {
        $classifications = Classification::all();
        $cellars = Cellar::all();

        return view('acopi::material.create', compact('classifications', 'cellars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'classification_id' => 'required|exists:classifications,id',
            'weight' => 'required|numeric',
            'entry_date' => 'required|date',
            'location' => 'required|string|max:255',
            'cellar_id' => 'required|exists:cellars,id',
            'charge' => 'required|string|max:255',
        ]);

        $material = new Material();
        $material->name = $request->name;
        $material->description = $request->description;
        $material->classification_id = $request->classification_id;
        $material->weight = $request->weight;
        $material->entry_date = $request->entry_date;
        $material->location = $request->location;
        $material->cellar_id = $request->cellar_id;
        $material->charge = $request->charge;
        $material->save();

        return redirect()->route('acopi.admin.material.listas')
                         ->with('success', 'Material creado correctamente');
    }

    public function showList()
    {
        $materials = Material::with('classification', 'cellar')->get();
        return view('acopi::material.lista', compact('materials'));
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $cellars = Cellar::all();
        $classifications = Classification::all();

        return view('acopi::material.edit', compact('material', 'cellars', 'classifications'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'classification_id' => 'required|exists:classifications,id',
            'weight' => 'required|numeric',
            'entry_date' => 'required|date',
            'location' => 'required|string|max:255',
            'cellar_id' => 'required|exists:cellars,id',
            'charge' => 'required|string|max:255',
        ]);

        $material = Material::findOrFail($id);
        $material->name = $request->name;
        $material->description = $request->description;
        $material->classification_id = $request->classification_id;
        $material->weight = $request->weight;
        $material->entry_date = $request->entry_date;
        $material->location = $request->location;
        $material->cellar_id = $request->cellar_id;
        $material->charge = $request->charge;
        $material->save();

        return redirect()->route('acopi.admin.material.listas')
                         ->with('success', 'Material actualizado correctamente');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('acopi.admin.material.listas')
                         ->with('success', 'Material eliminado correctamente.');
    }
}
