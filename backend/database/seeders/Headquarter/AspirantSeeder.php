<?php

namespace Database\Seeders\Headquarter;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspirantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aspirants')->insert([
            [
                'user_id' => '6028f8b99b7d00009e000cad',
                'school_id'  => '60264978b22e00009a006436',
                'positions'   => 2,
                'phone'    => '09456741684',
                // 'created_at'=>'02-20-2021',
                // 'updated_at'=> '03-11-2021',    
                'status'    => 'approved',     

            ],
            [
                'user_id' => '6028f8b99b7d00009e000cae',
                'school_id'  => '60264978b22e00009a006436',
                'positions'   => 2,
                'phone'    => '09456741654',
                // 'created_at'=>'02-20-2021',
                // 'updated_at'=> '03-11-2021', 
                'status'    => 'ongoing',        

            ],
            [
                'user_id' => '6028f8b99b7d00009e000caf',
                'school_id'  => '60264978b22e00009a006436',
                'positions'   => 'sample',
                'phone'    => '09456741687',
                // 'created_at'=>'02-20-2021',
                // 'updated_at'=> '03-11-2021',  
                'status'    => 'ongoing',       

            ],
            [
                'user_id' => '6028f8b99b7d00009e000cb0',
                'school_id'  => '60264978b22e00009a006436',
                'positions'   => 'sample',
                'phone'    => '09456741814',
                // 'created_at'=>'02-20-2021',
                // 'updated_at'=> '03-11-2021', 
                'status'    => 'ongoing',        

            ],
            [
                'user_id' => '6028f8b99b7d00009e000cb1',
                'school_id'  => '60264978b22e00009a006436',
                'positions'   => 'sample',
                'phone'    => '09456741655',
                // 'created_at'=>'02-20-2021',
                // 'updated_at'=> '03-11-2021',
                'status'    => 'denied',        

            ],
      ]);
    }
}
