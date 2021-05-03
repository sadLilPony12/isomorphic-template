<?php

namespace Database\Seeders\Classroom;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('classrooms')->insert([
            [
                '_id'       => new ObjectID('602dd65bbd7c0000910073b9'),
                'batch_id'     => '602d046f17130000b00059b0',
                'faculty_id' => '60265ff45737000029000979',
                'user_id'    => '60265ff45737000029000980',
                'position'   => 'adviser',
                'level_id'      => 10,
                'section_id' => 1,
                'room'     => "rizal 201",
                'officers' => json_decode('[
                    {"position":"president", "name":"kurdapia"},
                    {"position":"vp", "name":"kurdapio"}
                    ]'),
                'schedules' => json_decode('[
                    {"subject_id": 2, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":8,   "end":9,  "background":"secondary", "week":[2,4], 
                        "modules":[
                    {"title":"Isang pagong", "text":"pagong n umuwi", "posted_at":"3/5/21", "link":"http://localhost:3000/smis/cr/subject"},
                    {"title":"dalawang pagong", "text":"pagong n umuwi padin", "posted_at":"3/6/21", "link":"http://localhost:3000/smis/cr/subject"}
                        ],
                        "asgmts":[
                    {"title":"Isang pagong n may assignment", "text":"pagong n may assignment", "posted_at":"3/5/21"},
                    {"title":"dalawang pagong may assignment", "text":"pagong n may assignment padin", "posted_at":"3/6/21"}
                    ]
                },
                    {"subject_id": 5, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":8,   "end":9,  "background":"danger",    "week":[1,3,5],"modules":[], "asgmts":[]},
                    {"subject_id": 1, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436",  "start":9,  "end":10, "background":"danger",    "week":[2,3,4,5],"modules":[], "asgmts":[]},
                    {"subject_id": 3, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":10,  "end":11, "background":"primary",   "week":[1,2,4],"modules":[], "asgmts":[]},
                    {"subject_id": 4, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":11,  "end":12, "background":"success",   "week":[1,2,3,4],"modules":[], "asgmts":[]},
                    {"subject_id": 6, "room_id":"Room 201", "faculty_id":"60264978b22e00009a006436", "start":1,   "end":2,  "background":"success",   "week":[2],"modules":[], "asgmts":[]},
                    {"subject_id": 7, "room_id":"Room 201", "faculty_id":"60264978b22e00009a006436", "start":1,   "end":2,  "background":"primary",   "week":[3],"modules":[], "asgmts":[]},
                    {"subject_id": 12,"room_id":"Room 203", "faculty_id":"60264978b22e00009a006436", "start":1,   "end":2,  "background":"secondary", "week":[5],"modules":[], "asgmts":[]}
                ]'),
                'issues' => json_decode('[{"title":"No officers", "description":"Need to submit list of officers", "created_at":"today"}]')
            ],
            [
                '_id'       => new ObjectID('602dd65bbd7c0000910073ba'),
                'batch_id'     => '602d046f17130000b00059b0',
                'faculty_id' => '60265ff4573700002900097a',
                'user_id'    => '60265ff45737000029000980',
                'position'   => 'co-adviser',
                'level_id'      => 10,
                'section_id' => 2,
                'room'     => "rizal 201",
                'schedules' => json_decode('[
                    {"subject_id": 1, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "week":[2,3,4,5], "start":9, "end":11, "background":"secondary","modules":[], "asgmts":[]},
                    {"subject_id": 2, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "week":[1,2,3,4], "start":11, "end":12, "background":"danger","modules":[], "asgmts":[]},
                    {"subject_id": 3, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "week":[1,2,4], "start":9, "end":10, "background":"primary","modules":[], "asgmts":[]},
                    {"subject_id": 4, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "week":[2,4], "start":8, "end":9, "background":"secondary","modules":[], "asgmts":[]},
                    {"subject_id": 5, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "week":[1,3,5], "start":10, "end":11, "background":"primary","modules":[], "asgmts":[]},
                    {"subject_id": 6, "room_id":"Room 201", "faculty_id":"60264978b22e00009a006436", "week":[2], "start":10, "end":11, "background":"danger","modules":[], "asgmts":[]},
                    {"subject_id": 7, "room_id":"Room 201", "faculty_id":"60264978b22e00009a006436", "week":[2], "start":1, "end":1, "background":"primary","modules":[], "asgmts":[]},
                    {"subject_id": 12, "room_id":"Room 203", "faculty_id":"60264978b22e00009a006436", "week":[2], "start":2, "end":3, "background":"primary","modules":[], "asgmts":[]}
                ]'),
            ],
            [
                '_id'       => new ObjectID('602dd65bbd7c0000920073b9'),
                'batch_id'     => '602d046f17130000b00059b0',
                'faculty_id' => '60265ff4573700002900097a',
                'user_id'    => '60265ff45737000029000980',
                'position'   => 'adviser',
                'level_id'      => 12,
                'section_id' => 9,
                'room'     => "rizal 201",
                'officers' => json_decode('[
                    {"position":"president", "name":"kurdapia"},
                    {"position":"vp", "name":"kurdapio"}
                    ]'),
                'schedules' => json_decode('[
                    {"subject_id": 4, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":7,   "end":10,  "background":"danger", "week":[1],"modules":[], "asgmts":[]},
                    {"subject_id": 5, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":10,   "end":12,  "background":"success",    "week":[1],"modules":[], "asgmts":[]},
                    {"subject_id": 1, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436",  "start":1,  "end":2, "background":"primary",    "week":[1],"modules":[], "asgmts":[]},
                    {"subject_id": 3, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":7,  "end":8, "background":"info",   "week":[2,4],"modules":[], "asgmts":[]},
                    {"subject_id": 2, "room_id":"Room 200", "faculty_id":"60264978b22e00009a006436", "start":9,  "end":12, "background":"secondary",   "week":[3,5],"modules":[], "asgmts":[]}
                ]'),
                'issues' => json_decode('[{"title":"No officers", "description":"Need to submit list of officers", "created_at":"today"}]')
            ],
        ]);
    }
}
