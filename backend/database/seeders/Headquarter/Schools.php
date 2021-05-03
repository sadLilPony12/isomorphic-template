<?php

namespace Database\Seeders\Headquarter;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class Schools extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
      DB::table('schools')->insert([
        [
          '_id'    => new ObjectID('60264978b22e00009a006436'),
          'code'     => '300789',
          'name'     => 'Nueva Ecija University of Science and Technology',
          'acronyms' => 'NEUST',
          'country'  => 'Philippines',
          'region'   => 3,
          'province'   => 'Nueva Ecija',
          'district' => 'Rizal',
          'division' => 'NCR',
          // 'stages'   => json_decode('{
          //   "jhs":["SPS","ICT","STE","SPA"], 
          //   "shs":["ICT","STEM","HUMMS"]}'),
          'banner'  =>  'Nueva Ecija University of Science and Technology.jpg'
        ]
      ]);
    }
}
