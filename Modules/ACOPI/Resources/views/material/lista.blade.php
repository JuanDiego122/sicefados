@extends('acopi::layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Materiales Registrados</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('acopi.admin.material.create') }}" class="btn btn-primary mb-3">
        Registrar nuevo material
    </a>

    
    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Clasificación</th>
                    <th>Peso</th>
                    <th>Fecha Entrada</th>
                    <th>Ubicación</th>
                    <th>Bodega</th>
                    <th>Encargado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($materials as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->description }}</td>
                    <td>{{ $material->classification->name ?? 'Sin clasificación' }}</td>
                    <td>{{ $material->weight }}</td>
                    <td>{{ $material->entry_date }}</td>
                    <td>{{ $material->location }}</td>
                    <td>{{ $material->cellar->name ?? 'Sin celda' }}</td>
                    <td>{{ $material->charge}}</td>
                    <td>
                        <a href="{{ route('acopi.admin.material.create') }}" class="btn btn-sm btn-success">Nuevo</a>
                        <a href="{{ route('acopi.admin.material.edit', $material->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('acopi.admin.material.destroy', $material->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este material?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">No hay materiales registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
