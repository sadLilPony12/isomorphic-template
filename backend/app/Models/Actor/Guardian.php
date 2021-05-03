<?php

namespace App\Models\Actor;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Classroom\Advisory;

class Guardian extends Model
{
  
  protected $connection = 'mongodb';
  protected $table = 'guardians';
  protected $softDelete = true;
  protected $fillable = [
    'fname',
    'mname',
    'lname',
    'suffix',
    'is_male',
    'dob',
    'pob',
    'phone',
    'street',
    'brgy',
    'muni',
    'province',
    'image_ext',
    'session_id',
    'email',
    'relationship',
    'occupation',
    'password',
    'email_verified_at',
    'sessionArray'
  ];

  protected $casts = [
    'is_male'  => 'boolean',
];

  protected $appends = [
    'fullname',
    'address',
    'gender'
  ];

  public function getfullnameAttribute(){
    $fn=$this->fname.' '.  $this->lname;
    if($this->mname !=Null or $this->mname !='')  {
        $stringExp = explode(' ', $this->mname);
        $shortCode = '';
        for($i = 0; $i < count($stringExp); $i++):
            $shortCode .= substr($stringExp[$i], 0, 1);
        endfor;

        $fn =$this->fname . ' ' . $shortCode  . '. ' . $this->lname ;
    }
    return trim($fn.' '. $this->suffix);
  }

  public function getAddressAttribute(){
    return $this->brgy .', '. $this->muni .' '. $this->province;
  }
  public function getGenderAttribute(){
    return $this->is_male?'Male':'Female';
  }

  public function advisories(){return $this->hasMany(Advisory::class);}
}
