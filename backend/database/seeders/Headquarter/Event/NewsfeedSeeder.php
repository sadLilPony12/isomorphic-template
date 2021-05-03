<?php

namespace Database\Seeders\Headquarter\Event;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsfeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsfeeds')->insert([
            [
            'batch_id'      =>'602d046f17130000b00059b0',
            'title'         =>'Hello',
            'subtitle'      =>'Word',
            'attachment'    =>'video',
            'announcement'  =>'HAHAHAHHA',
            'category'      =>'campuses',
            ],
             [
            'batch_id'      =>'602d046f17130000b00059b0',
            'title'         =>'Hello2',
            'subtitle'      =>'Word2',
            'attachment'    =>'video',
            'announcement'  =>'HAHAHAHHA',
            'category'      =>'campuses',
             ],
              [
            'batch_id'      =>'602d046f17130000b00059b0',
            'title'         =>'Hello3',
            'subtitle'      =>'Word3',
            'attachment'    =>'video',
            'announcement'  =>'HAHAHAHHA',
            'category'      =>'campuses',
              ],
               [
            'batch_id'      =>'602d046f17130000b00059af',
            'title'         =>'Hello4',
            'subtitle'      =>'Word4',
            'attachment'    =>'video',
            'announcement'  =>'HAHAHAHHA',
            'category'      =>'campuses',
            ]
        ]);

    }
}
