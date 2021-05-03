<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Model;

class Accessibility extends Model
{
    protected $softDelete = true;
    protected $fillable = [
        'user_id',
        'access',
        'status',
    ];

    protected $casts = [
        'user_id'       => 'integer',
        'status'    => 'boolean',
    ];
}
