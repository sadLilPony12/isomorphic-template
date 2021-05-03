<?php

namespace Database\Seeders\Headquarter\Specialization;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            [
                'name' => 'Special Program in Sports',
                'acronym'  => 'SPS',
                'activity'   => 'traning', 

            ],
            [
                'name' => 'Special Program in Art',
                'acronym'  => 'SPA',
                'activity'   => 'Arts', 

            ],
            [
                'name' => 'Information and communication technology ',
                'acronym'  => 'ICT',
                'activity'   => 'ICT', 
            ],
               [
                'name' => 'Science and technology engineering',
                'acronym'  => 'STE',
                'activity'   => 'STE', 
            ],


        ]);
    }
}
