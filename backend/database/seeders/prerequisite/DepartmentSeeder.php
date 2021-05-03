<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
        [
          '_id'    => new ObjectID('605da3100c5500000c00476c'), 
          'school_id' => '60264978b22e00009a006436',
          'is_teaching' => true,
          'name'   => 'English',
          'acronym'  => 'English',
          'master_id' => '60854943b67400006600628e',
          'head_id'   => '60854943b67400006600628d',
        ],  
        [
          '_id'    => new ObjectID('605da3100c5500000c00486d'),
          'school_id' => '60264978b22e00009a006436',
          'is_teaching' => true,
          'name'   => 'Filipino',
          'acronym'  => 'Filipino',
        ], 
        [
          '_id'    => new ObjectID('605da3100c5500000c00496e'),
          'school_id' => '60264978b22e00009a006436',
          'is_teaching' => true,
          'name'   => 'Mathematics',
          'acronym' => 'Math',
        ],
        [
          '_id'    => new ObjectID('605da3100c5500000c00446f'),
          'school_id' => '60264978b22e00009a006436',
          'is_teaching' => true,
          'name'   => 'Science',
          'acronym' => 'Science',
        ],
        [
          '_id'    => new ObjectId('605da3100c5500000c004570'),
          'school_id' => '60264978b22e00009a006436',
          'name'   => 'MAPEH',
          'acronym' => 'MAPEH',
        ],
        [
          '_id'    => new ObjectId('605da3100c5500000c004671'),
          'school_id' => '60264978b22e00009a006436',
          'is_teaching' => true,
          'name'   => 'Aralin Panlipunan',
          'acronym' => 'AP',
        ],
        [
          '_id'    => new ObjectId('605da3100c5500000c004372'),
          'school_id' => '60264978b22e00009a006436',
          'is_teaching' => true,
          'name'   => 'Education sa Pagpapakatao',
          'acronym' => 'ESP',
        ],
        [
          '_id'    => new ObjectId('605da3100c5500000c00428a'),
          'school_id' => '60264978b22e00009a006436',
          'head_id' => '60265ff4573700002900097e',
          'master_id' => '60265ff4573700002900097d',
          'is_teaching' => true,
          'name'   => 'Technology and Livelihood Education',
          'acronym' => 'TLE',
        ],
      ]);
    }
}
