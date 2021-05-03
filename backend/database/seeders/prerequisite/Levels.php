<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Levels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('levels')->insert([
        [
            '_id'      => 10,
            'stage' => 'secondary',
            'name' => 'jhs',
            'description' => 'JHS Grade 7',
            'lvl' => 7
        ],
        [
            '_id'      => 11,
            'stage' => 'secondary',
            'name' => 'jhs',
            'description' => 'JHS Grade 8',
            'lvl' => 8
        ],
        [
            '_id'      => 12,
            'stage' => 'secondary',
            'name' => 'jhs',
            'description' => 'JHS Grade 9',
            'lvl' => 9
        ],
        [
            '_id'      => 13,
            'stage' => 'secondary',
            'name' => 'jhs',
            'description' => 'JHS Grade 10',
            'lvl' => 10
        ],
        [
            '_id'      => 14,
            'stage' => 'secondary',
            'name' => 'shs',
            'description' => 'SHS Grade 11',
            'lvl' => 11
        ],
        [
            '_id'      => 15,
            'stage' => 'secondary',
            'name' => 'shs',
            'description' => 'SHS Grade 12',
            'lvl' => 12
        ]
      ]);
    }
}
