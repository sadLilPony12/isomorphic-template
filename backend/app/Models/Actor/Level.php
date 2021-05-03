<?php

namespace App\Models\Actor;

use App\Models\Actor\User;
use App\Models\Actor\Room;
use App\Models\Actor\School;
use App\Models\Actor\Section;
// use MongoDB\BSON\ObjectId;

use Jenssegers\Mongodb\Eloquent\Model;

class level extends Model
  {
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        '_id',
        'name',
        'stage',
        'description',
        'lvl',
    ];
    protected $appends =[
        'fullname',
      ];
    public function getFullnameAttribute()
      {
        return strtoupper("{$this->stage}-{$this->name} : Grade {$this->lvl}");
      }
    // Relationship
    public function rooms(){return $this->hasOne(Room::class);}
  }
