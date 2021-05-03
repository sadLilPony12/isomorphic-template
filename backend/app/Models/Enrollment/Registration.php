<?php

namespace App\Models\Enrollment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\Student;
use App\Models\Actor\Level;
use App\Models\Actor\Subject;

class Registration extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'id',
        'student_id',
        'batch_id',
        'level_id',
        'units',
        'subjects',
        'attachments', 
        'assess_by',
        'assess_at', 
    ];
     protected $casts = [
        'level_id'   => 'integer',
        'units'    => 'integer',
        'assess_at'   => 'date:M d, y',
        ];
    
    protected $appends = [
        'studentname',
        'levelname',
        'subjectInfo'
    ];
    public function getStudentnameAttribute()
        {
            return $this->student->fullname;
        }
    public function getLevelnameAttribute()
        {
            return $this->level;
        }
    public function getSubjectinfoAttribute()
    {
       if($this->subjects){
           $subjects=[];
           foreach ($this->subjects as $value) {

               $subject=Subject::where('_id', $value['subject_id'])->first();
               $subject['section']=$value['section'];
               $subject['schedules']=$value['schedule'];
               $subject['faculty']=$value['faculty'];
               array_push($subjects, $subject);
           }
           return $subjects;
        // if($this->subjects){ return $subjects=Subject::whereIn('_id', $this->subjects)->get(); }
       }
    }
    // Relationship
    public function student(){return $this->belongsTo(Student::class);}
    public function user(){return $this->belongsTo(User::class);}
    public function sections(){return $this->belongsTo(Batch::class);}
    public function level(){return $this->belongsTo(Level::class);}
}
