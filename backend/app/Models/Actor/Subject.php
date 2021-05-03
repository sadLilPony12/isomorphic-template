<?php

namespace App\Models\Actor;
use App\Models\Actor\Level;

use Jenssegers\Mongodb\Eloquent\Model;

class Subject extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'level_id',
        'code',
        'name',
        'description',
        'lab',
        'lec',
        'Units',
        'is_major',
    ];
    protected $casts = [
        'lab'      => 'integer',
        'lec'      => 'integer',
        'Units'    => 'integer',
        'is_major' => 'boolean',
    ];
    protected $appends= [
        // 'fullname'
    ];
    public function getFullnameAttribute()
    {
        return "{$this->level->name}";
    }

    //indexing   
    public function level(){return $this->belongsTo(Level::class);}  

}
