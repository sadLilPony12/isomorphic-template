<?php

namespace Database\Seeders\Classroom;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectID;

class Loadss extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        // DB::table('loads')->insert([
        //     [
        //         'user_id'  => '60265ff45737000029000979',
        //         'batch_id'  => '602bd5c1b6760000b10058bf',
        //         'faculty_id'  => '60265ff4573700002900097f',
        //         'subjects' => [2,3,5,10,13],
        //         'schedules' => json_decode('[
        //             {"classroom_id":7, "subject_id":26, "code":"m7", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":7, "subject_id":27, "code":"e7", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":8, "subject_id":26, "code":"m7", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
        //             {"classroom_id":9, "subject_id":26, "code":"m7", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
        //             ]'),
        //     ],
        //     [
        //         'user_id'  => '60265ff45737000029000979',
        //         'batch_id'  => '602bd5c1b6760000b10058c0',
        //         'faculty_id'  => '60265ff45737000029000979',
        //         'subjects' => [1,3,5,6],
        //         'schedules' => json_decode('[
        //             {"classroom_id":7, "subject_id":26, "code":"m7", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":7, "subject_id":27, "code":"e7", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":8, "subject_id":26, "code":"m7", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
        //             {"classroom_id":9, "subject_id":26, "code":"m7", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
        //             ]'),
        //     ] ,
        //     [
        //         'user_id'  => '60265ff4573700002900097c',
        //         'batch_id'  => '602bd5c1b6760000b10058c0',
        //         'faculty_id'  => '60265ff4573700002900097c',
        //         'subjects' => [2,3,5,10,13],
        //         'schedules' => json_decode('[
        //             {"classroom_id":7, "subject_id":26, "code":"m7", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":7, "subject_id":27, "code":"e7", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":8, "subject_id":26, "code":"m7", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
        //             {"classroom_id":9, "subject_id":26, "code":"m7", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
        //             ]'),
        //     ],
        //     [
        //         'user_id'  => '60265ff4573700002900097d',
        //         'batch_id'  => '602bd5c1b6760000b10058c0',
        //         'faculty_id'  => '60265ff4573700002900097d',
        //         'subjects' => [1,3,5,6],
        //         'schedules' => json_decode('[
        //             {"classroom_id":7, "subject_id":26, "code":"m7", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":7, "subject_id":27, "code":"e7", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
        //             {"classroom_id":8, "subject_id":26, "code":"m7", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
        //             {"classroom_id":9, "subject_id":26, "code":"m7", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
        //             ]'),
        //     ]   
        // ]);
    }
}
