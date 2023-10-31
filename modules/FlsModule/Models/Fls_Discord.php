<?php

namespace Modules\FlsModule\Models;

use App\Contracts\Model;

class Fls_Discord extends Model
{
    public $table = 'Fls_discord';

    protected $fillable = [
        'server_id',
        'rawdata',
    ];

    // Validation rules
    public static $rules = [
        'server_id' => 'nullable',
        'rawdata'   => 'nullable',
    ];
}
