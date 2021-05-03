<?php

namespace App\Models\Enrollment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;
use App\Models\Actor\Section;
use App\Models\Actor\Level;
use App\Models\Headquarter\Batch;

class Designation extends Model
{
     protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'batch_id',
        'level_id',
        'section_id',
        'faculty_id',
        'user_id',
        'room',
        'appointed', 
        'title', 
        'officers', 
        'issues',
    ];

     protected $appends = [
        'appointed',
        'levelname',
        // 'sectionname',
        'status',
    ];
    public function getAppointedAttribute()
        {
            return $this->faculty;
        }
    public function getGenderAttribute()
        { 
            return $this->faculty->gender;
        }
        
    public function getAgeAttribute()
        {
            return $this->faculty->age;
        }
    public function getLevelnameAttribute()
        {
            if($this->level){
                 return $this->level->fullname;
            }
            return null;
        }
    public function getSectionnameAttribute()
        {
            if($this->section){
                 return $this->section->fullname;
            }
            return null;
        }
    public function getStatusAttribute()
        {
            if($this->batch){
                 return $this->batch->status;
            }
            return null;
        }

    //indexing
    public function faculty(){return $this->belongsTo(User::class,'faculty_id');}
    public function user(){return $this->belongsTo(User::class);}
    public function section(){return $this->belongsTo(Section::class);}
    public function level(){return $this->belongsTo(Level::class);}
    public function batch(){return $this->belongsTo(Batch::class);}

}
