<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortenUrl extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_DEACTIVATE = 2;

    
    protected $fillable = ['short_url','url','activated_at'];
    protected $dates = ['activated_at'];

}
