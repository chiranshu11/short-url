<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PlanUser extends Pivot
{
    protected $casts = [
        'is_active' => 'boolean'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
}
