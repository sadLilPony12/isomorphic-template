<?php

namespace App\Models\Actor;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\School;
use App\Models\Actor\Level;

class Room extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        '_id',
        'school_id',
        'level_id',
        'slots',
    ];
    //indexing
    public function level(){return $this->belongsTo(Level::class);}
    public function school(){return $this->belongsTo(School::class);}
}
