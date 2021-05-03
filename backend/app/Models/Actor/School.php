<?php

namespace App\Models\Actor;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Headquarter\Batch;
use App\Models\Actor\User;

class School extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'id',
        'code',
        'name',
        'acronyms',
        'division',
        'district',
        'region',
        'address',
        'extname',
        'credentials',
        'cp',
        'phone',
        'stages',
        'country',
    ];

    protected $casts = [
        'credentials' => 'object',
    ];
    
    protected $appends = [
        'address',
        'localAddress',
        'batch',
        'batch_sy',
        'employees',
    ];
    public function getAddressAttribute()
        {
            $region =['','I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII', 'XIII', 'XIV', 'XV'];
            return "{$this->district}, {$this->province}, Region {$region[$this->region]} {$this->country}";
        }
    public function getLocalAddressAttribute()
        {
            return "{$this->district}, {$this->province}";
        }
    public function getBatchAttribute()
        {
            return $this->batches()->whereStatus('ongoing')->first();
        }
    public function getBatchSyAttribute()
        {
            if ($this->batch) { return $this->batch->SY; }
            return null;
        }
    public function getEmployeesAttribute()
        {
            return $this->staffs()->whereNull('deleted_at')->whereNotNull('role_id')->count();
        }
    // Relationship
    public function batches(){return $this->hasMany(Batch::class);}
    public function staffs(){return $this->hasMany(User::class);}
}
