<?php

namespace Modules\ACOPI\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['slug', 'name', 'description', 'description_english', 'app_id'];

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
