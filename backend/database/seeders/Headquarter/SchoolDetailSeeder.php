<?php

namespace Database\Seeders\Headquarter;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class SchoolDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_details')->insert([
        [
          'school_id'    => '60264978b22e00009a006436',
          // editable | Personalized
          'hymn'     => 'satin ito..',
          'url_hymn' => '192.168.3659',
          'tagline'  => 'edi wow',
          'history'  => 'tinayo ng mga lolo nyo',
          'logo'     => 'logo.img',
          'icon'     => 'icon.ico',
          'mission'  => 'We foster our students’ love for learning, encourage them to try new and exciting things, and give them a solid foundation to build on.',
          'vision'   =>'Our vision is to empower students to acquire, demonstrate, articulate and value knowledge and skills that will support them, as life-long learners, to participate in and contribute to the global world and practise the core values of the school: respect, tolerance & inclusion, and excellence.', 
          'tagline'  =>'A Building With Four Walls And Tomorrow Inside',
          'other'  =>'Smart Campuse',
          // Officers
          'officers' => json_decode('{
                    "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                    "fullname":"Debralere Gay R. Pajarillaga",
                    "position":"principal",
                    "children":
                    [
                      {
                        "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                        "fullname":"Debralere Gay R. Pajarillaga",
                        "position":"Secretary",
                        "children":
                        [
                          {
                            "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                            "fullname":"Dennise Gay R. Pajarillaga",
                            "position":"Secretary",
                            "children":
                            [
                              {
                                "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                                "fullname":"Angel Gay R. Pajarillaga",
                                "position":"Secretary"
                              }
                            ]
                          }
                        ]
                      },
                       {
                        "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                        "fullname":"Debralere Gay R. Pajarillaga",
                        "position":"Secretary",
                        "children":
                        [
                          {
                            "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                            "fullname":"Dennise Gay R. Pajarillaga",
                            "position":"Secretary",
                            "children":
                            [
                              {
                                "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                                "fullname":"Angel Gay R. Pajarillaga",
                                "position":"Secretary"
                              },
                              {
                                "image":"https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg",
                                "fullname":"Angel Gay R. Pajarillaga",
                                "position":"Secretary"
                              }
                            ]
                          }
                        ]
                      }
                    ]
                  }')
        ]        
      ]);
    }
}
