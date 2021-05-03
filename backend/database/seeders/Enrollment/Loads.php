<?php

namespace Database\Seeders\Enrollment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectID;

class Loads extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        DB::table('loads')->insert([
            [
                'user_id'  => '60265ff45737000029000979',
                'batch_id'  => '602d046f17130000b00059b0',
                'faculty_id'  => '60265ff4573700002900097f',
                'subjects' => [2,3,5,10,13],
                'schedules' => json_decode('[
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":26, "code":"G7-buhawin", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":27, "code":"e7", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073ba", "subject_id":26, "code":"m7", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
                    {"classroom_id":"602dd65bbd7c0000910073ba", "subject_id":26, "code":"m7", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
                    ]'),
            ],
            [
                'user_id'  => '60265ff45737000029000979',
                'batch_id'  => '602d046f17130000b00059b0',
                'faculty_id'  => '60265ff45737000029000979',
                'subjects' => [1,3,5,6],
                'schedules' => json_decode('[
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":2, "code":"G7-Buhawi", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":3, "code":"G7-Buhawi", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073ba", "subject_id":2, "code":"G7-Max", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
                    {"classroom_id":"602dd65bbd7c0000920073b9", "subject_id":2, "code":"G7-Gin", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
                    ]'),
            ] ,
            [
                'user_id'  => '60265ff4573700002900097c',
                'batch_id'  => '602d046f17130000b00059b0',
                'faculty_id'  => '60265ff4573700002900097c',
                'subjects' => [2,3,5,10,13],
                'schedules' => json_decode('[
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":2, "code":"G7-Buhawi", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":3, "code":"G7-Buhawi", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073ba", "subject_id":2, "code":"G7-Max", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
                    {"classroom_id":"602dd65bbd7c0000920073b9", "subject_id":2, "code":"G7-Gin", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
                    ]'),
            ],
            [
                'user_id'  => '60265ff4573700002900097d',
                'batch_id'  => '602d046f17130000b00059b0',
                'faculty_id'  => '60265ff4573700002900097d',
                'subjects' => [1,3,5,6],
                 'schedules' => json_decode('[
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":26, "code":"G7-buhawin", "name":"Math 7",    "d":1, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073b9", "subject_id":27, "code":"e7", "name":"English 7", "d":1, "s":"08:00", "e":"09:00", "r":"Rizal Bdl-203"},
                    {"classroom_id":"602dd65bbd7c0000910073ba", "subject_id":26, "code":"m7", "name":"Math 7",    "d":3, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-204"},
                    {"classroom_id":"602dd65bbd7c0000910073ba", "subject_id":26, "code":"m7", "name":"Math 7",    "d":5, "s":"07:00", "e":"08:00", "r":"Rizal Bdl-202"}
                    ]'),
            ]   
        ]);
    }
}
