<?php

namespace App\Models\Tracking;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;

class Document extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'user_id',
        'department_id',
        'batch_id',
        'category',
        'code',
        'url',
        'title',
        'status',
        'issues',
        'signatories',
        'submitted_at',
        'check_by',
        'check_at',
        'approved_by',
        'approved_at',
        'filetype',
        'deadline_at',
    ];
    protected $casts = [
        'deadline_at' => 'date:M d, Y',
        ];

    protected $appends=[
        'email',
        'fullname',
        'checked',
        'reviewed',
        'noted',
        'issued_by'
    ];

    public function getEmailAttribute()
    {
       return $this->user->email;
    }
    public function getFullnameAttribute()
        {
            if ($this->user) {
                return $this->user->fullname;
            }
        }
    public function getCheckedAttribute()
        {
            if ($this->signatories) {
                if (count($this->signatories)>=1) {
                    $pop= json_decode('{}');
                    $val= $this->signatories[0]['checked_by'];
                    $user=User::find($val);
                    $pop->checked_by=$user->fullname;
                    $pop->checked_at=$this->signatories[0]['checked_at'];
                    return $pop;
                }
             }
        }
    public function getReviewedAttribute()
        {
            if ($this->signatories) {
                if (count($this->signatories)>=2) {
                    $pop= json_decode('{}');
                    $val=  $this->signatories[1]['reviewed_by'];
                    $user=User::find($val);
                    $pop->reviewed_by=$user->fullname;
                    $pop->reviewed_at=$this->signatories[1]['reviewed_at'];
                    return $pop;
                }
             }
        }
    public function getNotedAttribute()
        {
            if ($this->signatories) {
                if (count($this->signatories)===3) {
                    $pop= json_decode('{}');
                    $val=  $this->signatories[2]['noted_by'];
                    $user=User::find($val);
                    $pop->noted_by=$user->fullname;
                    $pop->noted_at=$this->signatories[2]['noted_at'];
                    return $pop;
                }
             }
        }
    public function getIssuedByAttribute()
        {
            if ($this->issues) {
                $pk=$this->issues['user_id'];
                $user=User::find($pk);
                return $user->fullname;
            }
        }
    // Relationship
    public function user(){return $this->belongsTo(User::class);}
}
