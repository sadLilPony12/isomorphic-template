<?php

namespace App\Models\Headquarter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $softDelete = true;
}
