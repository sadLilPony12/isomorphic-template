<?php

namespace App\Models\Actor;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;

class Role extends Model{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'name',
        'display_name',
        'category',
        'hrsduty',
        'daysduty',
        'basicpay',
        'dailypay',
        'SSS',
        'PHi',
        'COLA',
        'state'
    ];

    protected $casts = [
        'hrsduty' => 'integer',
        'daysduty' => 'integer',
        'basicpay' => 'double',
        'dailypay' => 'double',
        'SSS' => 'double',
        'PHi' => 'double',
        'COLA' => 'double',
        'state' => 'boolean',
    ];

    protected $appends = [
        // 'halfRate',
        // 'grossIncome',
        // 'deductions',
        // 'netpay'
    ];

    public function getHalfRateAttribute(){
        return $this->basicpay/2;
    }

    public function getGrossIncomeAttribute(){
        $GI = $this->halfRate + ($this->COLA/2);
        return $GI;
    }

    public function getDeductionsAttribute(){
        if (date('d') <= 15){
            return 0;
        }
        $GI = $this->SSS + $this->PHi;
        return $GI;
    }

    public function getNetpayAttribute(){
        $GI = $this->halfRate + ($this->COLA/2) - $this->deductions;
        return $GI;
    }
    // Relationship
    public function staff(){return $this->hasmany(User::class);}
}
