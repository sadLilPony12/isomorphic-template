<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDetail extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'icon',
        'logo',
        'history',
        'tagline',
        'mission',
        'vision',
        'others',
        'url_hymn',
        'hymn',
        'accounts',
        'batch_id',
        'officers'
    ];

}
