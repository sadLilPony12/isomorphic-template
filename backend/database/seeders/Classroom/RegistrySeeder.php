<?php

namespace Database\Seeders\Classroom;

use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectID;
use Illuminate\Support\Facades\DB;

class RegistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('registries')->insert([
            [
                '_id'       => new ObjectID('607540b67903000002003a51'),
                'user_id' => '6028f8b99b7d00009e000cad',
                'role_id'   => '60764981ea6c0000fa00595b',
                'level_id'   => 10,  
                'section_id'    => 1,
                'status' => 'pending', 
            ],  
            [
                // '_id'       => new ObjectID('607540b67903000002003a51'),
                'user_id'        => '6028f8b99b7d00009e000cad',
                'role_id'        => '6028f7713e320000f40026c2',
                'department_id'  =>'605da3100c5500000c00476c',
                'status'         => 'pending', 
            ],  
      ]);
    }
}
