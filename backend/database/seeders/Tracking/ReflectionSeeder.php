<?php

namespace Database\Seeders\Tracking;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class ReflectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reflections')->insert([
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'document_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff4573700002900097a',
          'url'      => 'my.url',
          'status'   => 'posted',
          'submmited_at' => "05/01/21",
          'signatories' => json_decode('[
            {
              "checked_by":"12356sas",
              "signed_at": "05/09/21"
            },
            {
              "received_by":"12356sas",
              "signed_at": "05/09/21"
            },
            {
              "noted":"12356sas",
              "signed_at": "05/09/21"
            }
            ]'),
          'issues'   =>json_decode('{"title":"inc", "text":"this is sample issues","issue_at":"05/09/21"}')
        ],  
        [
          // '_id'      => new ObjectID(''), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff4573700002900097a',
          'category' => 'whlp',
          'title'    => 'Araling 10-w2',
          'url'      => 'my.url',
          'status'   => 'pending',
        ], 
      ]);
    }
}
