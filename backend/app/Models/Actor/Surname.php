<?php

namespace App\Models\Actor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MongoDB\Operation\FindOneAndUpdate;
class Surname extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    public $timestamps = false;
    protected $fillable = ['name', '_id'];

    public function next_id()
        {
            // ref is the counter - change it to whatever you want to increment
            $this->_id = self::getID();
        }
    public static function bootUseAutoIncrementID()
        {
            static::creating(function ($model) {
                $model->sequencial_id = self::getID($model->getTable());
            });
        }
    public function getCasts()
        {
            return $this->casts;
        }

    private static function getID()
        {
            $seq =  \DB::table('surnames')->find(\DB::table('surnames')->max('_id'));
            return $seq;
            // $seq = DB::connection('mongodb')->getCollection('counters')->findOneAndUpdate(
            //     ['_id' => '_id'],
            //     ['$inc' => ['seq' => 1]],
            //     ['new' => true, 'upsert' => true, 'returnDocument' => FindOneAndUpdate::RETURN_DOCUMENT_AFTER]
            // );
            // return $seq->seq;
        }
}
