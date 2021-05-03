<?php

namespace App\Models\Headquarter;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\School;
use App\Models\Classroom\Advisory;
use App\Models\Actor\Level;
use App\Models\Actor\User;
use Carbon\Carbon;


class Batch extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'id',
        'school_id',
        'category',
        'semester',
        'SY',
        'e_start', //enrollment
        'e_end',
        'c_start', //classes
        'c_end',
        'status',
    ];
    protected $casts = [
        'e_start' => 'date:M d, Y',
        'e_end'   => 'date:M d, Y',
        'c_start' => 'date:M d, Y',
        'c_end'   => 'date:M d, Y',
    ];
    
    protected $appends = [
        'students',
        'sections',
        // 'schoolname',
        'enrollmentstatus'
  
    ];
    public function getSectionsAttribute(){
        return $this->levels->count();
    }
    public function getStudentsAttribute(){
        return $this->levels->sum('registered');
    }
    public function getSchoolnameAttribute(){
        if($this->school_id){return $this->school->name;}
        return null;
    }
    public function getEnrollmentstatusAttribute()
    {
        $current = Carbon::now();
        if ($this->e_start <= $current &&  $this->e_end >= $current ) {
            return 'ongoing';
        }else if ($current < $this->e_start) {
            return 'pending';
        }else{
            return 'has done';
        }

    }
    // Relationship
    public function school(){return $this->belongsTo(School::class);}
    public function advisory(){return $this->hasOne(Advisory::class);}
    public function levels(){return $this->hasMany(Level::class);}
    public function user(){return $this->belongsTo(User::class);}
}
