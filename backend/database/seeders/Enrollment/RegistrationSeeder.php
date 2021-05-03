<?php

namespace Database\Seeders\Enrollment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectID;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * if done can print COR, join section
     * @return void
     */
    public function run()
    {
         DB::table('registrations')->insert([
            [
                'student_id' => '60265ff4573700002900097e',
                'batch_id'   => '602d046f17130000b00059b0',
                'level_id'   => 10,
                'units'      => 21,
                'attachments'=> json_decode('[
                        "has_gm", 
                        "has_img",  
                        "has_card"  
                    ]'),
                'subjects'  => json_decode('[
                   {
                        "subject_id": 2, 
                        "section":"ROBLACKS", 
                        "schedule":[
                            "M 04:00 PM - 05:00 PM/INET",
                            "T 05:00 PM - 09:00 PM/UCC",
                            "Th 05:00 PM - 06:00 PM/UCC"],
                        "faculty": "Leona, Rodibelle F"
                    },
                    {
                        "subject_id": 3, 
                        "section":"ROBLACKS", 
                        "schedule":[
                            "M 04:00 PM - 05:00 PM/INET",
                            "T 05:00 PM - 09:00 PM/UCC",
                            "Th 05:00 PM - 06:00 PM/UCC"],
                        "faculty": "Leona, Rodibelle F"
                    },
                    {
                        "subject_id": 4, 
                        "section":"ROBLACKS", 
                        "schedule":[
                            "M 04:00 PM - 05:00 PM/INET",
                            "T 05:00 PM - 09:00 PM/UCC",
                            "Th 05:00 PM - 06:00 PM/UCC"],
                        "faculty": "Leona, Rodibelle F"
                    },
                    {
                        "subject_id": 5, 
                        "section":"ROBLACKS", 
                        "schedule":[
                            "M 04:00 PM - 05:00 PM/INET",
                            "T 05:00 PM - 09:00 PM/UCC",
                            "Th 05:00 PM - 06:00 PM/UCC"],
                        "faculty": "Leona, Rodibelle F"
                    },
                    {
                        "subject_id": 6, 
                        "section":"ROBLACKS", 
                        "schedule":[
                            "M 04:00 PM - 05:00 PM/INET",
                            "T 05:00 PM - 09:00 PM/UCC",
                            "Th 05:00 PM - 06:00 PM/UCC"],
                        "faculty": "Leona, Rodibelle F"
                    },
                    {
                        "subject_id": 7, 
                        "section":"ROBLACKS", 
                        "schedule":[
                            "M 04:00 PM - 05:00 PM/INET",
                            "T 05:00 PM - 09:00 PM/UCC",
                            "Th 05:00 PM - 06:00 PM/UCC"],
                        "faculty": "Leona, Rodibelle F"
                    }
                    ]'),
                'assessed_by' => '60265ff45737000029000979',
                'phone'     => '0935088979',
                'address'   => 'duag st. Di matae.', // Temporary Address
                'assessed_at' => '01-9-2021',      
                'issues'    => json_decode('[{
                            "title":"No TOR", 
                            "description":"Submit your TOR ASAP",
                            "assessor": "60265ff45737000029000979",
                            "created_at":"now()"
                        }]'),   
                'miscellaneous' => json_decode('{
                    "library fees":100,
                    "guidance fees":50,
                    "medical fees":80,
                    "registration fees":100,
                    "development fees":245,
                    "cultural fees":350,
                    "computer fees":790,
                    "athletic fees":790
                }'),
                'or' => '0634555A',
                'payment_at' => 'October 30, 2012 9:31 am',
                'status' => 'submitted', // submitted   enrolled
                'created_at'=>'01-09-2021',
            ],
            [
                'student_id' => '6028f8b99b7d00009e000cb2',
                'batch_id'   => '602d046f17130000b00059b0',
                'level_id'   => 7,
                'units'      => 'old',
                'attachments'=>json_decode('{"has_gm":0, "has_img":1, "has_cert":1, "has_card":1}'),
                'assessed_by'  => 2,
                'assessed_at'  => '02-03-2021',         
                'created_at'=>'01-09-2021',
            ],
            [
               'student_id' => '602dfb6dcc7700008b0002ab',
                'batch_id'  => '602d046f17130000b00059b0',
                'level_id'  => 7,
                'units'     => 'transferee',
                'attachments'  =>json_decode('{"has_gm":1, "has_img":1, "has_cert":0, "has_card":0}'),
                'assessed_by'  => 2,
                "issues"     => json_decode('[{"title":"good moral", "description":"need to submit ", "created_at":"04-08-2012"}]'),
                'assessed_at'  => '04-08-2012',         
                'created_at'=>'01-09-2021',
            ]
      ]);
    }
}
