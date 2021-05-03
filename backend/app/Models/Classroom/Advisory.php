<?php

namespace App\Models\Classroom;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\Level;
use App\Models\Actor\Student;
use App\Models\Designation;
use App\Models\Classroom\Classroom;
use App\Models\Headquarter\Batch;

class Advisory extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'category', // New | transferree | Returnee| Old
        'classroom_id',
        'student_id',
        'subjects',
        'guardian',
        'relationship',
        'bmi',  //sf-8
        'tlab',
        'tlec',
        'image_ext',
        'credentials',
        'grades',
        'issues',
        ];
    protected $casts = [
        // 'credential' =>'array',
        // 'grades' =>'array',
        ];
    protected $appends = [
        // 'completeInfo', //getCompleteInfoAttribute
        'SYBatch',
        'phone',
        'classroom',
        'url',
        'school',
        'level',
        'section',
        'fullname'
    ];

    public function getCompleteInfoAttribute()
        {
            return $this->fullname .'('. $this->level['fullsection'] .')';
        }
    public function getSYBatchAttribute()
        {
            // return $this->level['batch']['SY'];
        }
    public function getPhoneAttribute()
        {
            // return $this->guardian['phone'];
        }
    public function getClassroomAttribute()
        {
            return $this->classroom;
        }
    public function getUrlAttribute()
        {
            return "{$this->student->email}/{$this->student->fullname}";
        }
    public function getSchoolAttribute()
        {
            if($this->student){return $this->student->schoolname;}
        }
    public function getLevelAttribute()
        {
            if ($this->classroom) {
                return $this->classroom->levelname;
            } 
        }
    public function getSectionAttribute()
        {
            if ($this->classroom) {
                return $this->classroom->sectionname;
            }
        }
    public function getFullnameAttribute()
        {
            return $this->student->fullname;
        }
    // relationship
    public function student(){return $this->belongsTo(Student::class);}
    public function guardian(){return $this->belongsTo(Guardian::class);}
    public function level(){return $this->belongsTo(Level::class);}
    public function classroom(){return $this->belongsTo(Classroom::class);}
    public function designation(){return $this->belongsTo(Designation::class);}
}
