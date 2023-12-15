<?php

namespace Modules\FlsModule\Awards;

use App\Contracts\Award;

class FlsModule_Blank extends Award
{
    public $name = 'Blank Award';
    public $param_description = 'Parameter is not needed at all but write something';

    public function check($parameter = null): bool
    {
        return false;
    }
}
