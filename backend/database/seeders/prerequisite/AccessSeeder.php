<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('accesses')->insert([
        [
          '_id'    => new ObjectID('6028f7713e320000f40026bd'), 
          'name'   => 'Lbn',
          'display_name'  => 'Libarrian',
          'platform' => 'aLibrary'
        ],  
        // [
        //   '_id'    => new ObjectID('6028f7713e320000f40026be'),
        //   'name'   => 'hr',
        //   'display_name'  => 'Human Resouces',
        //   'platform' => 'aAdmission'
        // ], 
        [
          '_id'    => new ObjectID('6028f7713e320000f40026bf'),
          'name'   => 'cashier',
          'display_name' => 'Cashier',
          'platform' => 'aAccounting'
        ],
        [
          '_id'    => new ObjectID('6028f7713e320000f40026ce'),
          'name'   => 'registrar',
          'display_name' => 'Registrar',
          'platform' => 'aAdmission'
        ],
        [
          '_id'    => new ObjectId('6028f7713e320000f40026c1'),
          'name'   => 'faculty',
          'display_name' => 'Accounting',
          'platform' => 'aAccounting'
        ],
        // [
        //   '_id'    => new ObjectId('6028f7713e320000f40026c2'),
        //   'name'   => 'nis',
        //   'display_name' => 'mis',
        //   'platform' => 'aLibrary'
        // ],
        // [
        //   '_id'    => new ObjectId('6028f7713e320000f40026c3'),
        //   'name'   => 'procurement',
        //   'display_name' => 'Procurement',
        //   'platform' => 'aLibrary'
        // ],
        // [
        //   '_id'    => new ObjectId('6028f7713e320000f40026c4'),
        //   'name'   => 'GS',
        //   'display_name' => 'General Services',
        //   'platform' => 'aLibrary'
        // ],
      ]);
    }
}

