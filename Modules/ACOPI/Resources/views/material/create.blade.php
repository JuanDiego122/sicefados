@extends('acopi::layouts.master')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>¡Ups!</strong> Hubo algunos problemas con tus datos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('acopi.admin.material.store') }}" method="POST">
    @csrf
    <div class="container text-center">
        <div class="row">
           <div class="col-md-6"> 
                <div class="form-group">
                    <label for="name">Material</label>
                    <select name="name" id="name" class="form-control custom-select" required>
                        <option value="">Seleccione un material</option>
                        <option value="Carton" {{ old('name') == 'Carton' ? 'selected' : '' }}>Carton</option>
                        <option value="vidrio" {{ old('name') == 'vidrio' ? 'selected' : '' }}>Vidrio</option>
                        <option value="cargadores" {{ old('name') == 'cargadores' ? 'selected' : '' }}>Cargadores</option>
                    </select>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="classification_id">Clasificación</label>
                    <select name="classification_id" id="classification_id" class="form-control custom-select" required>
                        <option value="">Seleccione un tipo</option>
                        @foreach($classifications as $classification)
                            <option value="{{ $classification->id }}" {{ old('classification_id') == $classification->id ? 'selected' : '' }}>
                                {{ $classification->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('classification_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="weight">Peso:</label>
                    <input type="text" name="weight" class="form-control" placeholder="Ingrese el peso en kg" value="{{ old('weight') }}" required>
                    @error('weight') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="entry_date">Fecha de entrada</label>
                    <input type="date" name="entry_date" class="form-control" value="{{ old('entry_date') }}" required>
                    @error('entry_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="location">Ubicación</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
                    @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="cellar_id">Bodega</label>
                    <select name="cellar_id" id="cellar_id" class="form-control custom-select" required>
                        <option value="">Seleccione una bodega</option>
                        @foreach($cellars as $cellar)
                            <option value="{{ $cellar->id }}" {{ old('cellar_id') == $cellar->id ? 'selected' : '' }}>
                                {{ $cellar->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('cellar_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="charge">Encargado</label>
                    <input type="text" name="charge" class="form-control" value="{{ old('charge') }}" required>
                    @error('charge') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <br><br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Material</button>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    form {
        background-color: #ffffff;
        border: 1px solid #b2d8b2;
        padding: 30px;
        border-radius: 10px;
        max-width: 900px;
        margin: 40px auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    label {
        font-weight: bold;
        color: #2f4f2f;
        margin-bottom: 5px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #fff;
        transition: border-color 0.3s;
        font-size: 14px;
        line-height: 1.4;
    }

    .form-control:focus {
        border-color: #5cb85c;
        outline: none;
        box-shadow: 0 0 5px rgba(92, 184, 92, 0.3);
    }

    /* Estilos específicos para los selects */
    .custom-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
        padding-right: 40px;
        cursor: pointer;
        height: auto;
        min-height: 42px;
    }

    .custom-select:focus {
        border-color: #5cb85c;
        outline: none;
        box-shadow: 0 0 5px rgba(92, 184, 92, 0.3);
    }

    /* Hover effect para los selects */
    .custom-select:hover {
        border-color: #999;
    }

    .btn-success {
        background-color: #077507;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
    }

    .btn-success:hover {
        background-color: #188f18;
    }

    .text-danger {
        font-size: 0.875em;
    }

    /* Mejorar la apariencia en dispositivos móviles */
    @media (max-width: 768px) {
        .custom-select {
            font-size: 16px; /* Evita zoom en iOS */
        }
    }

    /* Estilos para alertas */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }

    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
</style>

@endsection