<?php

namespace Modules\ACOPI\Entities;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
