<?php

namespace App\Models\Enrollment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\Section;

class Scheduler extends Model
{
    /**
     * Class Schedules
     */
    use HasFactory;
    protected $connection = 'mongodb';
    protected $softDelete = true;

    protected $fillable = [
        'designation_id',
        'schedules',
        'is_lect',
        'prof_id',
        'day',
        'time',
        'hour',
    ];
    protected $appends = [
        'active',
        'sectionname',
        'range',
        'batchStatus'
    ];
    public function getActiveAttribute()
        {
            if($this->batch){return $this->batch->status;}
        }
    public function getSectionnameAttribute()
        {
            if($this->section){return $this->section->name;}
        }
    public function getRangeAttribute()
        {
            return $this->time;
        }
    public function getBatchStatusAttribute()
        {
           if($this->batch){ return $this->batch->status;}
        }
    // Relationship
    public function batch(){return $this->belongsTo(Batch::class, 'batch_id');}
    public function section(){return $this->belongsTo(Section::class);}
}
