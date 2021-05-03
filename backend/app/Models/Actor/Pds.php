<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;


// Personal data sheet
class Pds extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'details',
        'parents',
        'address',
        'pob',
        'image_ext',
        'profile',
        ];
}
