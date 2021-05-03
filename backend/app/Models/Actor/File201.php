<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Actor\User;


// Human Resource Management  Assessment Checklist 
class File201 extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'children',
        'husband',
        ];
}
