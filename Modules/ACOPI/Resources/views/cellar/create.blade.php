@extends('acopi::layouts.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Crear Nueva Bodega</h2>

    <form action="{{ route('acopi.admin.cellar.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Bodega</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('acopi.admin.cellar.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection