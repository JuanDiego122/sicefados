<?php

namespace Modules\Acopi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Acopi\Entities\Material;
use Modules\Acopi\Entities\Classification;
use Modules\Acopi\Entities\Cellar;

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
    return view('acopi::admin.create', compact('classifications', 'cellars'));
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'classification_id' => 'required|exists:classifications,id',
        'peso' => 'required|numeric',
        'fecha_ingreso' => 'required|date',
        'ubicacion' => 'required|string',
        'cellar_id' => 'required|exists:cellars,id',
    ]);

    // Crear el material
    Material::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'classification_id' => $request->classification_id,
        'peso' => $request->peso,
        'fecha_ingreso' => $request->fecha_ingreso,
        'ubicacion' => $request->ubicacion,
        'cellar_id' => $request->cellar_id,
    ]);

    return redirect()->back()->with('success', 'Material guardado correctamente.');
}

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
       
    }
}
