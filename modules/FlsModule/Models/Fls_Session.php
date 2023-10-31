<?php

namespace Modules\FlsModule\Models;

use App\Contracts\Model;
use App\Models\User;

class Fls_Session extends Model
{
    public $table = 'sessions';

    protected $casts = [
        'last_activity' => 'datetime',
    ];

    // Relationship
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
