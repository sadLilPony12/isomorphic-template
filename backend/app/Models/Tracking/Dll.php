<?php

namespace App\Models\Tracking;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;
use App\Models\Actor\Department;

class Dll extends Model
{
  protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'user_id',
        'department_id',
        'batch_id',
        'link',
        'file_type',
        'file_name',
        'status',
        'title',
        'description',
    ];
    
    protected $casts=[
      'created_at'=>"date:M d, Y"
    ];

    // Relationship
    public function user(){return $this->belongsTo(User::class);}
    public function head(){return $this->belongsTo(User::class);}
    public function master(){return $this->belongsTo(User::class);}
    public function department(){return $this->belongsTo(Department::class);}
}
