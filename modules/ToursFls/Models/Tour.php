<?php

namespace phpvms\tours\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';
    protected $fillable = ['nombre', 'descripcion', 'ruta'];
}
