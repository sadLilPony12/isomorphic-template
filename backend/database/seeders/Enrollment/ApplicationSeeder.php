<?php

namespace Database\Seeders\Enrollment;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectID;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Only for New and Transferee
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            [
                'student_id' => '6028f8b99b7d00009e000cae',
                'batch_id'   => '60265ff45737000029000978',
                'section_id' =>1,
                'level_id'   => 7,
                'category'   => 'new',
                // 'weight'     => 70.2,
                // 'height'     => 164.56,
                // 'phone'      => '0923456789',
                'attachments' => json_decode('[
                                    "has_gm",
                                    "has_img", 
                                    "has_sf9", 
                                    "has_sf10", 
                                    "has_psa"
                                ]'),
                'academic' => json_decode('{
                    "school":"NEUST", 
                    "code":"05689", 
                    "address":"Cabanatuan", 
                    "category":"Private", 
                    "religion":"Catholic"
                }'),
                'assess_by' => '60265ff45737000029000978',
                'status' => 'sample',  
                'assess_at' => '01-9-2021',         
               
            ],
            [
                'student_id' => '60265ff45737000029000978',
                'batch_id'   => '60265ff45737000029000978',
                'section_id' =>1,
                'level_id'   => 7,
                'category'   => 'new',
                'weight'     => 70.2,
                'height'     => 164.56,
                'phone'      => '0923456789',
                'status' => 'sample',  
                'attachments' => json_decode('[
                                    "has_gm" ,
                                    "has_img"
                                ]'),
                'assess_by' => '60265ff45737000029000978',
                'assess_at' => '01-9-2021',         
                'academic' => json_decode('{
                    "school":"NEUST", 
                    "code":"05689", 
                    "address":"Cabanatuan", 
                    "category":"Private", 
                    "religion":"Catholic"
                }'),
            ],
            [
                'student_id' => '60265ff45737000029000979',
                'batch_id'   => '60265ff45737000029000978',
                'section_id' =>1,
                'level_id'   => 7,
                'category'   => 'transferee',
                'status' => 'sample',  
                'weight'      => 70.2,
                'height'      => 164.56,
                'attachments'=>json_decode('[
                                    "has_gm", 
                                    "has_img", 
                                    "has_sf9", 
                                    "has_sf10"
                                ]'),
                'assess_by' => 1,
                'assess_at' => '02-03-2021',         

            ],
            [
                'student_id' => '60265ff4573700002900097a',
                'batch_id'   => '60265ff45737000029000978',
                'section_id' =>1,
                'level_id'   => 7,
                'category'   => 'transferee',
                'weight'      => 70.2,
                'status' => 'sample',  
                'height'      => 164.56,
                'attachments'   =>json_decode('[
                                    "has_gm", 
                                    "has_img",
                                ]'),
                'assess_by' => 1,
                "issues"   => json_decode('[
                                    {
                                        "title":"good moral",
                                        "description":"need to submit ", 
                                        "created_at":"04-08-2012"
                                    }]'),
                'assess_at' => '04-08-2012',         

            ],
            [
            "attachmentUrl"     =>json_decode(' {
                "has_img": "jpg",
                "has_gm": "jpg",
                "has_sf10": "pdf",
                "has_sf9": "pdf",
                "has_psa": "pdf"
            }'),
            "status"    =>"qualified",
            "student_id" => "6028f8b99b7d00009e000cad",
            "attachments" => json_decode('["has_img", "has_gm", "has_sf10", "has_sf9", "has_psa"]'),
            "academic" => json_decode('{
                "school": "adfasf",
                "code": "sdfafasd",
                "address": "sadfsdf",
                "religion": "sadfsafas"
            }'),
            "school_id" => "60264978b22e00009a006436",
            'section_id'   => 1,
            "category"  => "new",
            "stage" => "jhs",
            "level_id"  => 9,
            "created_at"    =>  "2021-03-14T00:58:28.112Z",
            "specialization"    => "SPS",
            ],
            [
            "attachmentUrl"     =>json_decode(' {
                "has_img": "jpg",
                "has_gm": "jpg",
                "has_sf10": "pdf",
                "has_sf9": "pdf",
                "has_psa": "pdf"
            }'),
            "status"    =>"submitted",
            "student_id" => "6028f8b99b7d00009e000cae",
            "attachments" => json_decode('["has_img", "has_gm", "has_sf10", "has_sf9", "has_psa"]'),
            "academic" => json_decode('{
                "school": "adfasf",
                "code": "sdfafasd",
                "address": "sadfsdf",
                "religion": "sadfsafas"
            }'),
            "school_id" => "60264978b22e00009a006436",
            "category"  => "new",
            "stage" => "jhs",
            "level_id"  => 9,
            "created_at"    =>  "2021-03-14T00:58:28.112Z",
            "specialization"    => "SPS",
            ],
            [
            "attachmentUrl"     =>json_decode(' {
                "has_img": "jpg",
                "has_gm": "jpg",
                "has_sf10": "pdf",
                "has_sf9": "pdf",
                "has_psa": "pdf"
            }'),
            "status"    =>"halt",
            "student_id" => "6028f8b99b7d00009e000cb0",
            "attachments" => json_decode('[ "has_gm", "has_sf10", "has_sf9", "has_psa"]'),
            "academic" => json_decode('{
                "school": "adfasf",
                "code": "sdfafasd",
                "address": "sadfsdf",
                "religion": "sadfsafas"
            }'),
            "school_id" => "60264978b22e00009a006436",
            "category"  => "new",
            "stage" => "jhs",
            "level_id"  => 9,
            "created_at"    =>  "2021-03-14T00:58:28.112Z",
            "specialization"    => "SPS",
            ],
            [
            "attachmentUrl"     =>json_decode(' {
                "has_img": "jpg",
                "has_gm": "jpg",
                "has_sf10": "pdf",
                "has_sf9": "pdf",
                "has_psa": "pdf"
            }'),
            "status"    =>"denied",
            "student_id" => "6028f8b99b7d00009e000cb1",
            "attachments" => json_decode('["has_img", "has_gm", "has_sf10", "has_psa"]'),
            "academic" => json_decode('{
                "school": "adfasf",
                "code": "sdfafasd",
                "address": "sadfsdf",
                "religion": "sadfsafas"
            }'),
            "school_id" => "60264978b22e00009a006436",
            "category"  => "new",
            "stage" => "jhs",
            "level_id"  => 9,
            "created_at"    =>  "2021-03-14T00:58:28.112Z",
            "specialization"    => "SPS",
            ]
      ]);
    }
}
