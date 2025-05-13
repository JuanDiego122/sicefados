@extends('acopi::layouts.master')

@section('content')

<form action="{{ route('acopi.admin.classificacion.store') }}" method="POST">
    @csrf
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nombre">Nombre del Material</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="classification_id">Clasificacion</label>
                    <select name="classification_id" class="form-control" required>
                        <option value="">Seleccione una clasificación</option>
                        @foreach ($classifications as $classification)
                        <option value="{{ $classification->id }}">{{ $classification->classification_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" name="peso" class="form-control" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de ingreso</label>
                    <input type="date" name="fecha_ingreso" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" name="ubicacion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cellar_id">Bodega</label>
                    <select name="cellar_id" class="form-control" required>
                        <option value="">Seleccione una bodega</option>
                        @foreach ($cellars as $cellar)
                        <option value="{{ $cellar->id }}">{{ $cellar->name }}</option>
                        @endforeach
                    </select>
                </div><br><br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Material</button>
                </div>
            </div>
        </div>
    </div>
</form>



<style>
    form {
        background-color: rgb(255, 255, 255);
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
    }

    label {
        font-weight: bold;
        color: #2f4f2f;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #fff;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #5cb85c;
        outline: none;
        box-shadow: 0 0 5px rgba(92, 184, 92, 0.3);
    }

    .btn-guardar {
        background-color: #5cb85c;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        display: block;
        width: 100%;
    }

    .btn-guardar:hover {
        background-color: #4cae4c;
    }
</style>







@endsection