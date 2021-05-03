<?php
namespace Database\Seeders\Prerequisite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\ObjectID;

class Students extends Seeder
{
    /**
     * Run the database seeds.
     * platforms[enrollment,  Calendar, Library, sPoll, sTabulations]
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
              '_id'        => new ObjectId('6028f8b99b7d00009e000cad'),
              'school_id'  => '60264978b22e00009a006436',
              'role_id'    => '60764981ea6c0000fa00595b',
              'fname'      => 'Tomas',
              'lrn'        => '12345',
              'mname_id'   => 1,
              'lname_id'   => 2,
              'is_male'    => true,
              'dob'        => '2000-09-08',
              'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'parents'    => json_decode('[
                                {
                                  "relation":"father",
                                  "lname":"Pajarillaga Sr", 
                                  "fname":"Tomas",
                                  "mname":"Q.",
                                  "occupation":"NA", 
                                  "phone":"09324596055"
                                }
                                {
                                  "relation":"mother",
                                  "lname":"Bautista Veuda Pajarillaga", 
                                  "fname":"Lolita",
                                  "mname":"P.",
                                  "occupation":"House wife", 
                                  "phone":"09324596055"
                                }
                            ]'),
              'bt'         => 'a',
              'email'      => 'student1@gmail.com',
              'password' => Hash::make('password'), 
              'has_rh'     => true,
              'image_ext'  => 'jpg',
              'benefits'   => ["4P's", 'CCT', 'ESC', 'QVR'],
              'scholarship' => 'PROVINCIAL SCHOLARSHIP PROGRAM',
              'status'      => 'submitted',
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'profile'   =>'jpg',
          'currentApp' => 'sClassroom'
            ],
            [
              '_id'       => new ObjectId('6028f8b99b7d00009e000cae'),
              'school_id' => '60264978b22e00009a006436',
              'role_id'    => '60764981ea6c0000fa00595b',
              'fname'    => 'Thomas Emmanuel',
              'mname_id' => 1492,
              'lname_id' => 1328,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'details' => json_decode('{"phone":"", "tongue":"", "ip":"", "religion":"", "track":"", "strand":"", "father":"", "mother":"","credential":""}'),
              'parents'    => json_decode("{'m':3, 'f':1}"),
              'offsprings' => json_decode('[4,5,6]'),
              'relatives'  => json_decode('[
                                      {"siblings":[7,8]},
                                      {"pamangkin":[9,10]}
                                      ]'),
              'email'    => 'student2@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,
              'image_ext' => 'jpg',              
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address 
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
            [
              '_id'       => new ObjectId('6028f8b99b7d00009e000caf'),
              'school_id' => '60264978b22e00009a006436',
              'role_id'    => '60764981ea6c0000fa00595b',
              'fname'    => 'Debralene',
              'mname_id' => 1492,
              'lname_id' => 1328,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student3@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,
              
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
            [
              '_id'       => new ObjectId('6028f8b99b7d00009e000cb0'),
              'school_id' => '60264978b22e00009a006436',
              'role_id'    => '60764981ea6c0000fa00595b',
              'fname'    => 'Lily',
              'lname_id' => 1328,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student4@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,              
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
            [
              '_id'       => new ObjectId('6028f8b99b7d00009e000cb1'),
              'school_id' => '60264978b22e00009a006436',
              'role_id'    => '60764981ea6c0000fa00595b',
              'fname'    => 'Leo',
              'mname_id' => 2,
              'lname_id' => 1328,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student5@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,              
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
            [
              '_id'       => new ObjectId('6028f8b99b7d00009e000cb2'),
              'school_id' => '60264978b22e00009a006436',
              'role_id'    => '60764981ea6c0000fa00595b',
              'fname'    => 'Ives',
              'mname_id' => 2,
              'lname_id' => 1328,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student6@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,
              'rentApp' => 'sEnrollment',
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
            [
              '_id'         => new ObjectId('602dfb6dcc7700008b0002ab'),
              'school_id' => '60264978b22e00009a006436',
              'fname'    => 'Benedict Earl Gabriel',
              'role_id'    => '60764981ea6c0000fa00595b',
              'mname_id' => 1492,
              'lname_id' => 1328,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student7@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,              
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
            [
              // '_id'         => new ObjectId(''),
              'school_id' => '60264978b22e00009a006436',
              'fname'    => 'Angel Dennise',
              'role_id'    => '60764981ea6c0000fa00595b',
              'mname_id' => 1492,
              'lname_id' => 1328,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student8@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
            [
              // '_id'         => new ObjectId(''),
              'school_id' => '60264978b22e00009a006436',
              'fname'    => 'Michael',
              'role_id'    => '60764981ea6c0000fa00595b',
              'mname_id' => 2,
              'lname_id' => 1,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student9@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
            ],
            [
              // '_id'         => new ObjectId(''),
              'fname'    => 'Elizabeth',
              'role_id'    => '60764981ea6c0000fa00595b',
              'mname_id' => 2,
              'lname_id' => 1,
              'is_male'  => true,
              'dob'      => '2000-09-08',
              'email'    => 'student10@gmail.com',
              'bt'       => 'a',
              'has_rh'   => true,
               'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'), // Permanent Address
              'password' => Hash::make('password'), 
          'currentApp' => 'sClassroom'
            ],
        ]);
    }
}
