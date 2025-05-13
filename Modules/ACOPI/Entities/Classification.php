<?php

namespace Modules\Acopi\Entities;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $fillable = ['nombre_classification'];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
