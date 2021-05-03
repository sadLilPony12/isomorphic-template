<?php

namespace Database\Seeders\Headquarter;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendars')->insert([
            [
            //   '_id'    => new ObjectID('6028f7713e320000f40026bd'),
              'batch_id' => '602d046f17130000b00059b0',
              'events'  =>json_decode('[
                    {
                        "user_id": "",
                        "start": "Sun Feb 21 2021 00:00:00 GMT+0800 (Singapore Standard Time)",
                        "end": "Mon Feb 22 2021 00:00:00 GMT+0800 (Singapore Standard Time)",
                        "slot": "[Sun Feb 07 2021 00:00:00 GMT+0800 (Singapore Standard Time)]",
                        "title": "Demo 1",
                        "desc": "Desc of Demo 1"
                    },
                    {
                        "user_id": "",
                        "start": "Tue Feb 09 2021 00:00:00 GMT+0800 (Singapore Standard Time)",
                        "end": "Fri Feb 12 2021 00:00:00 GMT+0800 (Singapore Standard Time)",
                        "slot": "[Sun Feb 07 2021 00:00:00 GMT+0800 (Singapore Standard Time)]",
                        "title": "Demo 2",
                        "desc": "Desc of Demo 2"
                    },
                    {
                        "user_id": "",
                        "start": "Sat Feb 20 2021 00:00:00 GMT+0800 (Singapore Standard Time)",
                        "end": "Mon Feb 22 2021 00:00:00 GMT+0800 (Singapore Standard Time)",
                        "slot": "[Thu Feb 18 2021 00:00:00 GMT+0800 (Singapore Standard Time)]",
                        "title": "Demo 3",
                        "desc": "Desc of Demo 3"
                    }
              ]'),
            ],      
          ]);
    }
}
