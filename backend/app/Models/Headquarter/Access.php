<?php

namespace App\Models\Headquarter;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;

class Access extends Model{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'display_name',
        'name',
        'platform'
    ];
    // Relationship
    public function user(){return $this->hasOne(User::class);}
}

