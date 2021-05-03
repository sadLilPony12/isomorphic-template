<?php

namespace App\Models\Headquarter\Event;

use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Headquarter\Batch;
use App\Models\Actor\User;

class Newsfeed extends Model
{
    protected $connection = 'mongodb';
    protected $softDelete = true;
    protected $fillable = [
        'batch_id',
        'title',
        'attachment',
        'subtitle',
        'announcement', 
        'category',
        'certain', 
        'file_type',
        'authorname',
        'author'
    ];

    //indexing
    public function batch(){return $this->belongsTo(Batch::class);}
}
