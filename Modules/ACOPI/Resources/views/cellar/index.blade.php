@extends('acopi::layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Listado de Bodegas</h2>

        <a href="{{ route('acopi.admin.cellar.create') }}" class="btn btn-primary mb-3">Crear nueva bodega</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cellars as $cellar)
                    <tr>
                        <td>{{ $cellar->id }}</td>
                      
                        <td>{{ $cellar->name }}</td>
                        <td>
                            <a href="{{ route('acopi.admin.cellar.edit', $cellar->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('acopi.admin.cellar.destroy', $cellar->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Desea eliminar esta bodega?')" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
