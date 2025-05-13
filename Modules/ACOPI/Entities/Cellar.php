<?php 
namespace Modules\Acopi\Entities;

use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
    protected $fillable = ['nombre', 'ubicacion']; // o los atributos que tú definiste

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
