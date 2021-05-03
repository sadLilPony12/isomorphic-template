<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Department extends Model
{
    
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        '_id',
        'name',
        'acronym',
        'is_teaching',
        'head_id',
        'master_id',
        'status',
    ];

    protected $casts = [
        'status'    => 'boolean',
    ];

    protected $appends = [
        'headname',
        'mastername', 
    ];

    public function getHeadnameAttribute()
        { 
            if($this->head){
                return $this->head->fullname;
            }
        }
    public function getMasternameAttribute()
        { 
            if($this->master){
                return $this->master->fullname;
            }
        }
    // Relationship
    public function head(){return $this->belongsTo(User::class, 'head_id');} 
    public function master(){return $this->belongsTo(User::class, 'master_id');}    
}
