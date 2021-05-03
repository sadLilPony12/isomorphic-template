<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class Sections extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            [
                '_id'       => 1,
                'school_id' => '60264978b22e00009a006436',
                'user_id'   => '60265ff4573700002900097d',
                'specialization_id'     =>3,
                'name'      => 'ROBLOX',
                'category'  => 'SPED',
                'level_id'     => 10,
                'accumulate'  => 42,
                'studentsArr'  => ['6028f8b99b7d00009e000cad','6028f8b99b7d00009e000cad'],
                'created_at' => '2018-07-25 09:51:07',
                'updated_at' =>'2018-07-25 09:51:07'
            ],
            [
                '_id'       => 2,
                'school_id' => '60264978b22e00009a006436',
                'user_id'   => '60265ff4573700002900097d',
                'specialization_id'     =>2,
                'name'      => 'MINECRAFT',
                'major'     => 'JHS',
                'level_id'     => 10,
                'accumulate'  => 42,
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 3,
                'school_id' => '60264978b22e00009a006436',
                'user_id'   => '60265ff4573700002900097d',
                'specialization_id'     =>1,
                'name'      => 'ADELFA',
                'major'     => 'JHS',
                'level_id'     => 10,
                'accumulate'  => 48,
                'trackStrand'=> 'BS I.T',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 4,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'CARNATION',
                'major'     => 'JHS',
                'level_id'     => 10,
                'accumulate'  => 46,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 5,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'LARRY PAGE',
                'major'     => 'JHS',
                'level_id'     => 11,
                'accumulate'  => 33,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 6,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'NARRA',
                'major'     => 'JHS',
                'level_id'     => 11,
                'accumulate'  => 37,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 7,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'MOLAVE',
                'major'     => 'JHS',
                'level_id'     => 11,
                'accumulate'  => 34,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 8,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'YAKAL',
                'major'     => 'JHS',
                'level_id'     => 11,
                'accumulate'  => 34,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d', 
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 9,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'MARK ZUCKERBERG',
                'major'     => 'JHS',
                'level_id'     => 12,
                'accumulate'  => 36,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 10,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'BONIFACIO',
                'major'     => 'JHS',
                'level_id'     => 10,
                'accumulate'  => 36,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 11,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'H.E.',
                'major'     => 'shs',
                'level_id'     => 11,
                'accumulate'  => 36,
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 12,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'H.E.',
                'major'     => 'shs',
                'level_id'     => 12,
                'accumulate'  => 36,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 13,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'EIM',
                'major'     => 'shs',
                'level_id'     => 11,
                'accumulate'  => 36,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
            [
                '_id'       => 14,
                'school_id' => '60264978b22e00009a006436',
                'name'      => 'EIM',
                'major'     => 'shs',
                'level_id'     => 12,
                'accumulate'  => 36,
                'trackStrand'=> 'BS I.T',
                'user_id'   => '60265ff4573700002900097d',
                'created_at' => '2019-07-25 09:51:07',
                'updated_at' =>'2019-07-25 09:51:07'
            ],
        ]);
    }
}
