<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('rooms')->insert([
        [
            '_id'    => 1,
            'school_id' => '60264978b22e00009a006436',
            'level_id'   => 10,
            'slots'   => json_decode('[
                {"name": "R-201", "building":"Rizal"},
                {"name": "R-202", "building":"Rizal"},
                {"name": "R-203", "building":"Rizal"},
                {"name": "R-204", "building":"Rizal"},
                {"name": "R-205", "building":"Rizal"},
                {"name": "R-206", "building":"Rizal"}
            ]')
        ],  
        [
            '_id'    => 2,
            'school_id' => '60264978b22e00009a006436',
            'level_id'   => 11,
            'slots'   => json_decode('[
                {"name": "R-301", "building":"Rizal"},
                {"name": "R-302", "building":"Rizal"},
                {"name": "R-303", "building":"Rizal"},
                {"name": "R-304", "building":"Rizal"},
                {"name": "R-305", "building":"Rizal"},
                {"name": "R-306", "building":"Rizal"}
            ]')
        ], 
        [
          '_id'    => 3,
          'school_id' => '60264978b22e00009a006436',
          'level_id'   => 12,
          'slots'   => json_decode('[
                {"name": "R-301", "building":"Rizal"},
                {"name": "R-302", "building":"Rizal"},
                {"name": "R-303", "building":"Rizal"},
                {"name": "R-304", "building":"Rizal"},
                {"name": "R-305", "building":"Rizal"},
                {"name": "R-306", "building":"Rizal"}
            ]')
        ],
        [
          '_id'    => 4,
          'school_id' => '60264978b22e00009a006436',
          'level_id'   => 13,
          'slots'   => json_decode('[
                {"name": "R-301", "building":"Rizal"},
                {"name": "R-302", "building":"Rizal"},
                {"name": "R-303", "building":"Rizal"},
                {"name": "R-304", "building":"Rizal"},
                {"name": "R-305", "building":"Rizal"},
                {"name": "R-306", "building":"Rizal"}
            ]')
        ],
        [
          '_id'    => 5,
          'school_id' => '60264978b22e00009a006436',
          'level_id'   => 14,
          'slots'   => json_decode('[
                {"name": "R-301", "building":"Rizal"},
                {"name": "R-302", "building":"Rizal"},
                {"name": "R-303", "building":"Rizal"},
                {"name": "R-304", "building":"Rizal"},
                {"name": "R-305", "building":"Rizal"},
                {"name": "R-306", "building":"Rizal"}
            ]')
        ],
        [
          '_id'    => 6,
          'school_id' => '60264978b22e00009a006436',
          'level_id'   => 15,
          'slots'   => json_decode('[
                {"name": "R-301", "building":"Rizal"},
                {"name": "R-302", "building":"Rizal"},
                {"name": "R-303", "building":"Rizal"},
                {"name": "R-304", "building":"Rizal"},
                {"name": "R-305", "building":"Rizal"},
                {"name": "R-306", "building":"Rizal"}
            ]')
        ],
        [
          '_id'    => 7,
          'school_id' => '60264978b22e00009a006436',
          'level_id'   => 13,
          'slots'   => json_decode('[
                {"name": "R-301", "building":"Rizal"},
                {"name": "R-302", "building":"Rizal"},
                {"name": "R-303", "building":"Rizal"},
                {"name": "R-304", "building":"Rizal"},
                {"name": "R-305", "building":"Rizal"},
                {"name": "R-306", "building":"Rizal"}
            ]')
        ],
        [
          '_id'    => 8,
          'school_id' => '60264978b22e00009a006436',
          'level_id'   => 14,
          'slots'   => json_decode('[
                {"name": "R-301", "building":"Rizal"},
                {"name": "R-302", "building":"Rizal"},
                {"name": "R-303", "building":"Rizal"},
                {"name": "R-304", "building":"Rizal"},
                {"name": "R-305", "building":"Rizal"},
                {"name": "R-306", "building":"Rizal"}
            ]')
        ],
      ]);
    }
}
