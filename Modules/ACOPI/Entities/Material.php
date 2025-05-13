<?php


namespace Modules\Acopi\Entities;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // App\Models\Material.php
protected $fillable = [
    'nombre',
    'descripcion',
    'classification_id',
    'peso',
    'fecha_ingreso',
    'ubicacion',
    'cellar_id',
];

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function cellar()
    {
        return $this->belongsTo(Cellar::class);
    }
}
