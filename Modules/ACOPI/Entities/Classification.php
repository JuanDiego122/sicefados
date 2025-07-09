<?php

namespace Modules\Acopi\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Acopi\Entities\Material; // ✅ Esta línea es la clave

class Classification extends Model
{
    protected $fillable = ['classification_name'];
    protected $table = 'classifications';

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function getNameAttribute()
    {
        return $this->classification_name;
    }
}
