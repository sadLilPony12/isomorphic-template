<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\BSON\ObjectId;

use Jenssegers\Mongodb\Eloquent\Model;

class Registry extends Model
{
    use HasFactory;
    protected $table= 'registries';
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'level_id',
        'section_id',
        'department_id',
        'user_id',
        'status',
        'title',
        'issue'
    ];
    protected $casts = [
        'created_at' => 'date:M d, Y',
    ];
    protected $appends = [
        'grade_n_section',
        'fullname'
    ];

    public function getGradeNSectionAttribute(){
        if($this->section){
            return $this->section->fullname;
        } 
    }
    public function getFullnameAttribute(){
        if($this->user){
            return $this->user->fullname;
        }
    }
    public function level(){return $this->belongsTo(Level::class);}
    public function user(){return $this->belongsTo(User::class);}
    public function section(){return $this->belongsTo(Section::class);}
}
