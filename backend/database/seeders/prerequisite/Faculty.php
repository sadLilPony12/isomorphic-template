<?php

namespace Database\Seeders\Prerequisite;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use MongoDB\BSON\ObjectID;

class Faculty extends Seeder
{
    /**
     * Run the database seeds.
     * platforms[enrollment, **Admission, Forms, pInventory, Calendar, pSF, Tabulations, Inventory, Tracking, pTabulation]
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          [
            '_id'      => new ObjectID('60265ff45737000029000979'),
            'ern'   => '100010142',
            'role_id'  => '6028f7713e320000f40026c1', 
            'department_id' => '605da3100c5500000c00476c',
            'school_id' => '60264978b22e00009a006436',
            'name'     => 'imo',
            'fname'    => 'Randimo',
            'mname_id'    => 238,
            'lname_id'    => 128,
            'email_verified_at' => '2020-05-16',
            'email'    => 'faculty1@gmail.com',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'password' => Hash::make('password'),
            'academic' => json_decode('{"school":"NEUST", "code":"05689", "address":"Cabanatuan", "category":"Private", "religion":"Catholic"}'),   //Academic Information
            'details' => json_decode('{"phone":"", "tongue":"", "ip":"", "religion":"", "track":"", "strand":"", "father":"", "mother":"","credential":""}'),
            'stages' =>['jhs','shs'],
            'accounts' => 'premium',
            'position' => 'Master Teacher II',
            'platforms' => ['aPoll'],
            'status'   => 'permanent',
          'currentApp' => 'fClassroom'
          ],
          [
            '_id'       => new ObjectID('60265ff4573700002900097c'),
            'ern'   => '100010143',
            'role_id'   => '6028f7713e320000f40026c1',
            'department_id' => '605da3100c5500000c00476c',
            'school_id' => '60264978b22e00009a006436',
            'name'     => 'Evelyn',
            'fname'    => 'Stanly',
            'mname_id'    => 238,
            'lname_id'    => 568,           
            'email_verified_at' => '2020-05-16',
            'email'    => 'faculty2@gmail.com',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'password' => Hash::make('password'),
            'stages' =>['jhs'],
            'accounts' => 'premium',
            'position' => 'Teacher I',
            'platforms' => ['fPageant','fClassroom', 'fEnrollment'],
            'status'   => 'permanent',
          'currentApp' => 'fClassroom'
          ],
          [
            '_id'       => new ObjectID('60265ff4573700002900097d'),
            'role_id'   => '6028f7713e320000f40026c1',
            'department_id' => '605da3100c5500000c00476c',
            'school_id' => '60264978b22e00009a006436',
            'ern'   => '100010145',
            'name'     => 'Randi',
            'fname'    => 'kumag',
            'mname_id'    => 238,
            'lname_id'    => 562,       
            'email_verified_at' => '2020-05-16',
            'email'    => 'faculty3@gmail.com',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'password' => Hash::make('password'),
            'stages' =>['jhs'],
            'accounts' => 'premium',
            'position' => 'Teacher III',
            'status'   => 'permanent',
          'currentApp' => 'fClassroom'
          ],
          [
            '_id'       => new ObjectID('60265ff4573700002900097e'),
            'role_id'   => '6028f7713e320000f40026c1',
            'school_id' => '60264978b22e00009a006436',
            'department_id' => '605da3100c5500000c00476c',
            'ern'   => '100010146',
            'name'     => 'Jenny',
            'fname'    => 'Jennyfer',
            'lname_id'    => 526,         
            'email_verified_at' => '2020-05-16',
            'email'    => 'teacher@gmail.com',
            'password' => Hash::make('password'),
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'stages' =>['shs'],
            'position' => 'Teacher III',
            'status'   => 'permanent',
          'currentApp' => 'fClassroom'
          ],
          [
            '_id'       => new ObjectID('60265ff4573700002900097f'),
            'role_id'   => '6028f7713e320000f40026c2',
            'school_id' => '60264978b22e00009a006436',
            'department_id' => '605da3100c5500000c00476c',
            'ern'   => '100010147',
            'name'     => 'Randiy',
            'fname'    => 'Feasta',
            'lname_id' => 235,    
            'email_verified_at' => '2020-05-16',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'email'    => 'staff@gmail.com',
            'password' => Hash::make('password'),
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'stages' =>['shs'],
            'position' => 'Custodian',
            'platforms' => ['aTabulation','aLibrary'],
            'status'   => 'provisional',
          'currentApp' => 'fClassroom'

          ],
          [
            '_id'       => new ObjectID('60265ff45737000029000980'),
            'ern'   => '100010148',
            'name'     => 'Jhon',
            'fname'    => 'Mark Jhon',
            'department_id' => '605da3100c5500000c004570',
            'mname_id'    => 369,
            'lname_id'    => 654,       
            'email_verified_at' => '2020-05-16',
            'email'    => 'newFaculty@gmail.com',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'password' => Hash::make('password'),
            'stages'   =>['shs'],
            'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'),
            'position' => 'Accountant',
            'status'   => 'permanent',
          'currentApp' => 'fClassroom'
            ],
            [
            '_id'       => new ObjectID('60854943b67400006600628d'),
            'ern'   => '100010148',
            'name'     => 'Head',
            'fname'    => 'Head Jhon',
            'school_id' => '60264978b22e00009a006436',
            'role_id'  => '607eeb9da6730000f2006c9c', 
            'department_id' => '605da3100c5500000c00476c',
            'mname_id'    => 369,
            'lname_id'    => 654,       
            'email_verified_at' => '2020-05-16',
            'email'    => 'head@gmail.com',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'password' => Hash::make('password'),
            'stages'   =>['shs'],
            'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'),
            'position' => 'Accountant',
            'status'   => 'permanent',
          'currentApp' => 'fClassroom'
            ],
              [
            '_id'       => new ObjectID('60854943b67400006600628e'),
            'ern'   => '1000101482',
            'name'     => 'Master',
            'fname'    => 'Master Jhon',
            'school_id' => '60264978b22e00009a006436',
            'role_id'  => '607eeb9da6730000f2006c9d', 
            'department_id' => '605da3100c5500000c00476c',
            'mname_id'    => 369,
            'lname_id'    => 654,       
            'email_verified_at' => '2020-05-16',
            'email'    => 'master@gmail.com',
            'address'   => json_decode('{
              "country":"Philippines",
              "region":"REGION I (ILOCOS REGION)",
              "province":"ILOCOS NORTE",
              "municipality":"ADAMS",
              "brgy":"Adams (Pob.)"
            }'),
            'password' => Hash::make('password'),
            'stages'   =>['shs'],
            'address'   => json_decode('{
                "country":"Philippines",
                "region":"REGION I (ILOCOS REGION)",
                "province":"ILOCOS NORTE",
                "municipality":"ADAMS",
                "brgy":"Adams (Pob.)"
              }'),
            'position' => 'Accountant',
            'status'   => 'permanent',
          'currentApp' => 'fClassroom'
          ]
        ]);
    }
}
