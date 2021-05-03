<?php

namespace Database\Seeders\Headquarter;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class Batches extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('batches')->insert([
            [
                '_id'       => new ObjectID('602d046f17130000b00059af'),
                'school_id' => '60264978b22e00009a006436',
                'semester' => 1,
                'stages'   => 'jhs',
                'SY'       => '2019-2020',
                'e_start'  => '2019-05-01',
                'e_end'    => '2019-06-01',
                'c_start'  => '2019-06-11',
                'c_end'    => '2020-03-31',
                'status'   => 'done',
                'miscellaneous' => json_decode('[
                    {
                        "level":7,
                        "trustFund":
                            {
                                "library fees":100, 
                                "guidance fees":50,
                                "medical fees":80,
                                "registration fees":100,
                                "development fees":245,
                                "cultural fees":350,
                                "computer fees":790,
                                "athletic fees":790
                            }
                            },
                    {
                        "level":8,
                        "trustFund":
                            {
                                "library fees":100,
                                "guidance fees":50,
                                "medical fees":80,
                                "registration fees":100,
                                "development fees":245,
                                "cultural fees":350,
                                "computer fees":790,
                                "athletic fees":790
                            }
                        }
                    ]')
            ],  
            [
                '_id'       => new ObjectID('602d046f17130000b00059b0'),
                'school_id' => '60264978b22e00009a006436',
                'semester' => 1,
                'stages'   => 'shs',
                'SY'       => '2020-2021',
                'e_start'  => '2020-05-01',
                'e_end'    => '2021-06-01',
                'c_start'  => '2020-06-11',
                'c_end'    => '2021-03-31',
                'status'   => 'ongoing',
                'miscellaneous' => json_decode('[
                    {
                        "level":7,
                        "trustFund":
                            {
                                "library fees":100, 
                                "guidance fees":50,
                                "medical fees":80,
                                "registration fees":100,
                                "development fees":245,
                                "cultural fees":350,
                                "computer fees":790,
                                "athletic fees":790
                            }
                            },
                    {
                        "level":8,
                        "trustFund":
                            {
                                "library fees":100,
                                "guidance fees":50,
                                "medical fees":80,
                                "registration fees":100,
                                "development fees":245,
                                "cultural fees":350,
                                "computer fees":790,
                                "athletic fees":790
                            }
                        }
                    ]')
            ],  
            [
                '_id'       => new ObjectID('602d046f17130000b00059b1'),
                'school_id' => '60264978b22e00009a006436',
                'semester' => 1,
                'stages'   => 'jhs',
                'SY'       => '2020-2021',
                'e_start'  => '2020-05-01',
                'e_end'    => '2019-06-01',
                'status'   => 'pending',
            ]
      ]);
    }
}
