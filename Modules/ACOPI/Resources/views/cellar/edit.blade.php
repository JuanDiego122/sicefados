@extends('acopi::layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Editar Bodega</h2>

    <form action="{{ route('acopi.admin.cellar.update', $cellar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre de la Bodega</label>
            <input type="text" name="name" class="form-control" value="{{ $cellar->name }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Actualizar</button>
        <a href="{{ route('acopi.admin.cellar.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
