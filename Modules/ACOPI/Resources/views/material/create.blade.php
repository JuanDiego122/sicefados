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
            <div class="col">
                <div class="form-group">
                    <label for="name">Nombre del Material</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="classification_id">Clasificación</label>
                    <select name="classification_id" id="classification_id" class="form-control select2" required>
                        <option value="">Seleccione una clasificación</option>
                        <option value="1" {{ old('classification_id') == 1 ? 'selected' : '' }}>Peligroso</option>
                        <option value="2" {{ old('classification_id') == 2 ? 'selected' : '' }}>Orgánico</option>
                        <option value="3" {{ old('classification_id') == 3 ? 'selected' : '' }}>Ordinario</option>
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
                    <select name="cellar_id" id="cellar_id" class="form-control select2" required>
                        <option value="">Seleccione una bodega</option>
                        <option value="1" {{ old('cellar_id') == 1 ? 'selected' : '' }}>Bodega 1</option>
                        <option value="2" {{ old('cellar_id') == 2 ? 'selected' : '' }}>Bodega 2</option>
                        <option value="3" {{ old('cellar_id') == 3 ? 'selected' : '' }}>Bodega 3</option>
                    </select>
                    @error('cellar_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <br><br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Material</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Select2 CSS y JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Seleccione una opción",
            allowClear: true,
            width: '100%'
        });
    });
</script>

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
</style>

@endsection
