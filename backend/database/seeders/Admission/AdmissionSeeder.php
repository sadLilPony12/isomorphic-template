<?php

namespace Database\Seeders\Admission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admissions')->insert([
            [
                
                'school_id' => '60264978b22e00009a006436',
                'user_id' => '60265ff4573700002900097a',
                'level_id'   => 10,
                'questionaire_id'=>'60265ff45737000059000988',
                'items'=>50,
                'description' => 'addional school',
                'name'   => 'entrance exam',
                'start_at'=>'01-09-2021',
                'end_at'=> '01-11-2021',  
            ],  
        ]);
    }
}
