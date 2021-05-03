<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Classroom\Advisory;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'users';
    protected $softDelete = true;

    protected $fillable = [
        'school_id',
        'level_id',
        'section_id',
        'lrn',
        'name',
        'fname',
        'mname_id',
        'lname_id',
        'suffix',
        'is_male',
        'phone',
        'dob',
        'pob',
        'image_ext',
        'email',
        'email_verified_at',
        'password',
        'session_id',
        'sessionArray',
        'details',
        'address'
        ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob'          => 'date:M d, Y',
        'is_male'      => 'boolean',
        'sessionArray' => 'array',
        'has_image'    => 'boolean',
        'is_active'    => 'boolean',
        ];

    protected $hidden = [
        'password',
        'remember_token',
        ];
    
    protected $appends = [
        'fullname',
        'url',
        'gender',
        'schoolname',
        'age',
        'fulladdress'
    ];
    public function getAgeAttribute()
        {
            if ($this->dob) { return Carbon::parse($this->attributes['dob'])->age;  };
        }
    public function getFullnameAttribute()
        {
            $fn=$this->fname.' '.  $this->lastname->name;
            if($this->mname_id !=Null or $this->mname_id !='')  {
                $stringExp = explode(' ', $this->middlename->name);
                $shortCode = '';
                for($i = 0; $i < count($stringExp); $i++):
                    $shortCode .= substr($stringExp[$i], 0, 1);
                endfor;

                $fn =$this->fname . ' ' . $shortCode  . '. ' . $this->lastname->name ;
            }
            return  strtoupper(trim($fn.' '. $this->suffix));
        }
    public function getUrlAttribute()
    {
        if ($this->image_ext) {
            return "{$this->email}/{$this->fullname}.{$this->image_ext}";
        }
        return 'undifined';
    }
    public function getGenderAttribute()
        { 
            return $this->is_male?'Male':'Female';
        }

    public function getFulladdressAttribute()
    { 
        // if ($this->address) {
        //     $address = "{$this->address->brgy} {$this->address->municipality}, {$this->address->province}";
        //     return $address;
        // }
        return $this->address;
        
    }
    public function getSchoolnameAttribute()
        {
            if($this->school){return $this->school->name;}
        }
    // Relationship 
    public function lastname(){return $this->belongsTo(Surname::class,'lname_id');}
    public function middlename(){return $this->belongsTo(Surname::class, 'mname_id');}
    public function school(){return $this->belongsTo(School::class);}  
    public function advisories(){return $this->hasMany(Advisory::class);}
}
