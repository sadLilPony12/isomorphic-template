<?php

namespace Database\Seeders\Enrollment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class SchedulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lab 2 hrs and lec 1 hr 
        DB::table('schedulers')->insert([
                [
                'batch_id' => '602d046f17130000b00059b0',
                'level_id' => 9,
                'section_id' => 9,
                ],
        ]);
    }
}
