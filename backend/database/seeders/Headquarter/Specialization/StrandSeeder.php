<?php

namespace Database\Seeders\Headquarter\Specialization;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('strands')->insert([
            [
                'name' => 'Science, Technology, Engineering, Mathematics',
                'acronym'  => 'STEM',
                'major'   => ['gen math','pre cal'], 

            ],
            [
                'name' => 'Technical-Vocational-Livelihood',
                'acronym'  => 'TVL',
                'major'   => ['emtech','pre cal'], 

            ],
            [
                'name' => 'Information and communication technology ',
                'acronym'  => 'ICT',
                'major'   =>['CSS'], 

            ],
            [
                'name' => 'General Academic Strand',
                'acronym'  => 'GAS',
                'major'   => ['CSS', 'pre cal'], 

            ],


        ]);
    }
}
