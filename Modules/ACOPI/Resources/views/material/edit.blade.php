@extends('acopi::layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Editar Material</h2>

    <form action="{{ route('acopi.admin.material.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ old('name', $material->name) }}" class="form-control" required>

                <label>Descripción</label>
                <input type="text" name="description" value="{{ old('description', $material->description) }}" class="form-control" required>

                <label>Clasificación</label>
                <select name="classification_id" class="form-control" required>
                    <option value="1" {{ $material->classification_id == 1 ? 'selected' : '' }}>Peligroso</option>
                    <option value="2" {{ $material->classification_id == 2 ? 'selected' : '' }}>Orgánico</option>
                    <option value="3" {{ $material->classification_id == 3 ? 'selected' : '' }}>Ordinario</option>
                </select>

                <label>Peso (kg)</label>
                <input type="number" name="weight" value="{{ old('weight', $material->weight) }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Fecha de entrada</label>
                <input type="date" name="entry_date" value="{{ old('entry_date', $material->entry_date) }}" class="form-control" required>

                <label>Ubicación</label>
                <input type="text" name="location" value="{{ old('location', $material->location) }}" class="form-control" required>

                <label for="cellar_id">Bodega</label>
    <select name="cellar_id" id="cellar_id" class="form-control select2" required>
        <option value="">Seleccione una bodega</option>
        @foreach($cellars as $cellar)
            <option value="{{ $cellar->id }}" {{ old('cellar_id') == $cellar->id ? 'selected' : '' }}>
                {{ $cellar->name }}
            </option>
         @endforeach
         </select>

         <label>Encargado</label>
                <input type="text" name="charge" value="{{ old('charge', $material->charge) }}" class="form-control" required>

                <br>
                <button type="submit" class="btn btn-success mt-3">Actualizar Material</button>
            </div>
        </div>
    </form>
</div>
@endsection
