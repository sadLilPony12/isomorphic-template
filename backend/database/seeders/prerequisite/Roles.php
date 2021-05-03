<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        [
          '_id'    => new ObjectID('6028f7713e320000f40026bd'), 
          'name'   => 'dev',
          'display_name'  => 'Developer',
        ],  
        [
          '_id'    => new ObjectID('6028f7713e320000f40026be'),
          'name'   => 'superadmin',
          'display_name'  => 'Super Administrator',
        ], 
        [
          '_id'    => new ObjectID('6028f7713e320000f40026bf'),
          'name'   => 'admin',
          'display_name' => 'Administrator',
        ],
        [
          '_id'    => new ObjectID('6028f7713e320000f40026c0'),
          'name'   => 'principal',
          'display_name' => 'Principal',
        ],
        [
          '_id'    => new ObjectId('6028f7713e320000f40026c1'),
          'name'   => 'faculty',
          'display_name' => 'Faculty',
        ],
        [
          '_id'    => new ObjectId('6028f7713e320000f40026c2'),
          'name'   => 'staff',
          'display_name' => 'Staff',
        ],  
        [
          '_id'    => new ObjectId('60764981ea6c0000fa00595b'),
          'name'   => 'student',
          'display_name' => 'Student',
        ],
        [
          '_id'    => new ObjectId('60764981ea6c0000fa00595c'),
          'name'   => 'visitor',
          'display_name' => 'Visitor',
        ],
        [
          '_id'    => new ObjectId('607eeb9da6730000f2006c9c'),
          'name'   => 'head',
          'display_name' => 'Head',
        ],
        [
          '_id'    => new ObjectId('607eeb9da6730000f2006c9d'),
          'name'   => 'master',
          'display_name' => 'Master',
        ]
      ]);
    }
}
