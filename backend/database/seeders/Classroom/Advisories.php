<?php

namespace Database\Seeders\Classroom;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class Advisories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('advisories')->insert([
            [
                'classroom_id' => '602dd65bbd7c0000910073b9',
                'student_id'  => '6028f8b99b7d00009e000cad',              
                'guardian' => json_decode('{"id":"60264978b22e00009a006436", "relationship":"mother"}'),
                'bmi'=>json_decode('{"height":157, "weight":60}'),
                'tlab' => 3,
                'tlec' => 18,
                'credentials'=>'PSA',
                'image_ext'=>'.jpg',
                'subjects' => json_decode('[
                    {
                        "id": 1,
                        "title":"Math",
                        "prof_id": "7d124",
                        "records":[
                                    {"title":"First Quarter",
                                        "log":
                                            {
                                                "raw":{
                                                    "attn":[5,["5/3","5/4","5/9"]],
                                                    "assignment":[25,[20]],
                                                    "quizzes":[60,[20,15,15]],
                                                    "activities":[120,[50,55]],
                                                    "TermPaper":[100,[98]]},
                                                    "final":{"attn":10,"quizzes":50,"activities":105,"TermPaper":98,"grades":95}
                                            }
                                    },
                                    {"title":"Second Quarter",
                                        "log":
                                            {
                                                "raw":{"attn":[5,["6/3","6/4","6/9"]],"quizzes":[60,[20,15,20]],"activities":[120,[50,55,10]],"TermPaper":[100, [98]]},
                                                 "final":{"attn":10,"quizzes":55,"activities":115,"TermPaper":98,"grades":95}
                                            }
                                    },
                                    {"title":"Third Quarter",
                                        "log":
                                            {
                                                "raw":{"attn":[4,["6/3","6/4","6/9"]],"quizzes":[50,[20,20]],"activities":[80,[50,25]]}
                                            }
                                    }
                                ],
                        "module":[0,1],
                        "asgmt":[[0,1],[1]]
                    },
                    {
                        "id": 2,
                        "title":"English",
                        "prof_id": "7d124",
                        "score":[
                                    {
                                        "Q1":{
                                            "attn":10,
                                            "quizzes":50,
                                            "activities":105,
                                            "TermPaper":98,
                                            "grades":95
                                        }
                                    },
                                    {
                                        "Q2":{
                                            "attn":10,
                                            "quizzes":50,
                                            "activities":105,
                                            "TermPaper":98,
                                            "grades":88
                                        }
                                    }
                                ]
                    }
                ]'),
                'issues'=>json_decode('[{
                    "title":"nabura ng di sadya",
                    "text":"sinadyang burahin",
                    "created_at":"10-05-2021"
                }]')
            ],  
            [
                'classroom_id' => '602dd65bbd7c0000910073b9',
                'student_id'  => '6028f8b99b7d00009e000cae',
                'guardian_id' => '60264978b22e00009a006436',
                'subjects' => json_decode('[
                    {
                        "id": 2,
                        "title":"Filipino",
                        "prof_id": "7d124",
                        "score":[
                                    {
                                        "Q1":{
                                            "attn":10,
                                            "quizzes":40,
                                            "activities":95,
                                            "TermPaper":90,
                                            "grades":85
                                        }
                                    },
                                    {
                                        "Q2":{
                                            "attn":10,
                                            "quizzes":50,
                                            "activities":105,
                                            "TermPaper":98,
                                            "grades":88
                                        }
                                    }
                                ]
                    }
                ]')
            ],
            [
                'classroom_id' => '602dd65bbd7c0000910073b9',
                'student_id'  => '6028f8b99b7d00009e000caf',
                'level'       => 7,
                'section_id'  => 2,
                'guardian_id' => '60264978b22e00009a006436',
            ]
      ]);
    }
}
