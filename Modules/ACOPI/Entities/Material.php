<?php


namespace Modules\Acopi\Entities;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // App\Models\Material.php
protected $fillable = [
    'name',
    'description',
    'classification_id',
    'weight',
    'entry_date',
    'location',
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
