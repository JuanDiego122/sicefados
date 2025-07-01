<?php

namespace Modules\Acopi\Entities;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $fillable = ['classification_name'];
    protected $table ='classifications';

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
