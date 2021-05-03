<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectID;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
          '_id'       => new ObjectID('60265ff45737000029000978'),
          'role_id'   => '6028f7713e320000f40026bd',
          'school_id' => '60264978b22e00009a006436',
          'ern'    => '12345saple',
          'phone'    => '1234Phone',
          'name'   => 'Thom-thom',
          'fname'  => 'Thomas Emmanuel',
          'mname_id'  => 5,
          'mname_id' =>1484,  
          'lname_id'  => 235,
          'suffix' => 'III',
          'email_verified_at' => '2020-05-16',
          'address'   => json_decode('{
                  "country":"Philippines",
                  "region":"REGION I (ILOCOS REGION)",
                  "province":"ILOCOS NORTE",
                  "municipality":"ADAMS",
                  "brgy":"Adams (Pob.)"
                }'),
          'email'    => 'dev@gmail.com',
          'password' => Hash::make('password'), 
          'academic' => json_decode('{"school":"NEUST", "code":"05689", "address":"Cabanatuan", "category":"Private", "religion":"Catholic", "sy":"2018-2019"}'),   //Academic Information
          'platforms' => [
            'aEnrollment',
            'aAdmission',
            'aHeadquarter',
            'aSF',
            'aLibrary',
            'aPageant',
            'aInventory',
            'aAccounting',
            'aAttendance',
            'aTracking',
            'aGAA',
            'aPoll',
            'aTabulation',
            'aForbidden'
          ],
          'currentApp' => 'aHeadquarter'
        ],
        [
          '_id'       => new ObjectID('60265ff4573700002900097a'),
          'role_id'   => '6028f7713e320000f40026be',
          'school_id' => '60264978b22e00009a006436',
          'ern'   => '6789',
          'name'     => 'Benedict',
          'fname'    => 'Benedict Earle Gabriel',
          'mname_id' =>1484,  
          'lname_id'    => 1321,
          'email_verified_at' => '2020-05-16',
          'email'    => 'superadmin@gmail.com',
          'password' => Hash::make('password'),
          'position' => 'Superadmin',
          'address'   => json_decode('{
            "country":"Philippines",
            "region":"REGION I (ILOCOS REGION)",
            "province":"ILOCOS NORTE",
            "municipality":"ADAMS",
            "brgy":"Adams (Pob.)"
          }'), // Permanent Address
          'platforms' => [ 
            'aHeadquarter',
            'aEnrollment',
            'aAdmission',
            'aSF',
            'aLibrary',
            'aPageant',
            'aAttendance',
            'aInventory',
            'aAccounting',
            'aTracking',
            'aGAA',              
            'aPoll',
            'aTabulation'
          ],
          'currentApp' => 'aHeadquarter',
          'profile'   =>'Benedict Earle Gabriel.png'
        ],
        [
          '_id'       => new ObjectID('60265ff4573700002900097b'),
          'role_id'   => '6028f7713e320000f40026bf',
          'school_id' => '60264978b22e00009a006436',
          'empNum'   => 100010151,
          'name'     => 'Thom',
          'fname'    => 'Thomas',
          'mname_id' =>1484,  
          'lname_id'    => 356,
          'email_verified_at' => '2020-05-16',
          'email'    => 'admin@gmail.com',
          'password' => Hash::make('password'),
          'position' => 'Admin',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'), // Permanent Address
          'platforms' => [
            'aHeadquarter',
            'aEnrollment',
            'aAdmission',
            'aSF',
            'aLibrary',
            'aPageant',
            'aAttendance',
            'aInventory',
            'aAccounting',
            'aTracking',
            'aGAA',              
            'aPoll',
            'aTabulation'
          ],
          'currentApp' => 'aHeadquarter',
          'profile'   =>'Thomas.png'
        ],
        [
          '_id'       => new ObjectID('60718bbdde580000250050ce'),
          'role_id'   => '6028f7713e320000f40026c0',
          'school_id' => '60264978b22e00009a006436',
          'empNum'   => 100010152,
          'name'     => 'Channey',
          'fname'    => 'Channey Y\'dreo',
          'lname_id' => 1156,
          'mname_id' =>181,  
          'email_verified_at' => '2020-05-16',
          'email'    => 'principal@gmail.com',
          'password' => Hash::make('password'),
          'position' => 'Principal II',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'), // Permanent Address
          'platforms' => [
            'aHeadquarter',
            'aEnrollment',
            'aAdmission',
            'aSF',
            'aLibrary',
            'aPageant',
            'aAttendance',
            'aInventory',
            'aAccounting',
            'aTracking',
            'aGAA',              
            'aPoll',
            'aTabulation'
          ],
          'currentApp' => 'aHeadquarter',
          'profile'   =>'Channey Y\'dreo.jpg'
        ],
      ]);
    }
}
