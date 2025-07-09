<?php 
namespace Modules\ACOPI\Entities;

use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
    protected $fillable = ['name', 'location'];
}

