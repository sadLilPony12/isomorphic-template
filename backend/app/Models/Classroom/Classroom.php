<?php

namespace App\Models\Classroom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\Section;
use App\Models\Actor\Level;
use App\Models\Actor\User;
use App\Models\Actor\Faculty;
use App\Models\Actor\Subject;
use App\Models\Headquarter\Batch;

class Classroom extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $softDelete = true;

    protected $fillable = [
        'batch_id',
        'faculty_id',
        'user_id',
        'level_id',
        'section_id',
        'position',
        'room',
        'schedules',
        'officers',
        'issues',
        'subjects',
    ];
    protected $casts = [
            // 'issues' => 'array',
        ];
    protected $appends = [
        'active',
        'sectionname',
        'levelname',
        'schedule_info'
    ];
    public function getActiveAttribute()
        {
            if($this->batch){return $this->batch->status;}
        }
    public function getScheduleInfoAttribute()
        {
            if ($this->schedules) {
                $schedules=[];
            foreach ($this->schedules as $key => $value) {
                try {
                $prof=User::find($value['faculty_id']);
                // $subject=Subject::find((int)$value['id']);
                $subject=Subject::where('_id', '=', (int)$value['id'])->first();
                $subject ? $value['subject']=$subject->name : '';
                $prof ? $value['professor']=$prof->fullname :$value['professor']='(TO BE ASSIGNED)';
                array_push($schedules, $value);
                } catch (\Throwable $th) {
                    //throw $th;
                }
              
            }
            return $schedules;
            }
            return null;
           
        }
    public function getSectionnameAttribute()
        {
            if($this->section){return $this->section->name;}
        }
    public function getLevelnameAttribute()
        {
            if($this->level){ return $this->level->fullname;}
        }
    // // Relationship
    public function batch(){return $this->belongsTo(Batch::class);}
    public function advisories(){return $this->hasMany(Advisory::class);}
    public function section(){return $this->belongsTo(Section::class);}
    public function level(){return $this->belongsTo(Level::class);}
    public function faculty(){return $this->belongsTo(Faculty::class);}
}
