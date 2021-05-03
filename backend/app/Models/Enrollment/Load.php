<?php

namespace App\Models\Enrollment;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;
use App\Models\Actor\School;
use App\Models\Headquarter\Batch;

class Load extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'batch_id',
        'user_id',
        'faculty_id',
        'schedules',
        'subjects'
    ];

    protected $appends = [
       'active',
    ];
    public function getActiveAttribute()
        {
            if($this->batch){return $this->batch->status;}
        }

    // Relationship
    public function user(){return $this->belongsTo(User::class);}
    public function batch(){return $this->belongsTo(Batch::class);}
    public function sections(){return $this->belongsTo(Section::class);}
}
