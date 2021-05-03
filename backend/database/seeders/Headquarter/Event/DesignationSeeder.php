<?php

namespace Database\Seeders\Headquarter\Event;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Advisory Designation
     * nxt loads
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
              [
                'title'       =>'sample',
                'faculty_id' => '60265ff4573700002900097c',
                'user_id' => '60265ff4573700002900097b',
                'batch_id'   => '602d046f17130000b00059b0',
                'level_id'   => 10,
                'room'       =>'sample'
              ],
        ]);
    }
}
