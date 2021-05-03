<?php

namespace Database\Seeders\Tracking;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
      DB::table('documents')->insert([
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'pending', // a.pending, b.submitted, c.checked, d.reviewed, e.noted 
        ],  
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'submitted', // a.pending, b.submitted, c.checked, d.reviewed, e.noted 
          'submitted_at' => "05/01/21",
        ],  
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'denied', // denied by checker
          'submitted_at' => "05/01/21",
          'issues'   =>json_decode('{"title":"inc", "text":"this is sample issues","issue_at":"05/09/21","user_id":"60265ff45737000029000979"}')
        ],  
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'checked', // a.pending, b.submitted, c.checked, d.reviewed, e.noted 
          'submitted_at' => "05/01/21",
          'signatories'  => json_decode('[
            {
              "checked_by":"60854943b67400006600628e",
              "checked_at": "05/09/21"
            }
            ]'),
        ],  
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'denied', //denied by reviewer
          'submitted_at' => "05/01/21",
          'signatories'  => json_decode('[
            {
              "checked_by":"60854943b67400006600628e",
              "checked_at": "05/09/21"
            }
            ]'),
          'issues'   =>json_decode('{"title":"inc", "text":"this is sample issues","issue_at":"05/09/21","user_id":"60265ff45737000029000979"}')
        ],  
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'reviewed', // a.pending, b.submitted, c.checked, d.reviewed, e.noted 
          'submitted_at' => "05/01/21",
          'signatories'  => json_decode('[
            {
              "checked_by":"60854943b67400006600628e",
              "checked_at": "05/09/21"
            },
            {
              "reviewed_by":"60854943b67400006600628d",
              "reviewed_at": "05/09/21"
            }
            ]'),
        ],  
        [
          // '_id'      => new ObjectID('6028f7713e320000f40026bd'), 
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'denied', // denied by principal 
          'submitted_at' => "05/01/21",
          'signatories'  => json_decode('[
            {
              "checked_by":"60854943b67400006600628e",
              "checked_at": "05/09/21"
            },
            {
              "reviewed_by":"60854943b67400006600628d",
              "reviewed_at": "05/09/21"
            }
            ]'),
          'issues'   =>json_decode('{"title":"inc", "text":"this is sample issues","issue_at":"05/09/21","user_id":"60265ff45737000029000979"}')
        ],  
        [
          'batch_id' => '602d046f17130000b00059b0',
          'user_id'  => '60265ff45737000029000979',
          'department_id' => '605da3100c5500000c00476c',
          'code'          => 'AP5KPK-IIIa-5',  // Teach to all classes
          'title'         => 'january lesson plan',
          'filetype' => 'pdf',
          'category'      => 'dll',
          'url'      => 'my.url',
          'status'   => 'noted', // a.pending, b.submitted, c.checked, d.reviewed, e.noted 
          'submitted_at' => "05/01/21",
          'signatories'  => json_decode('[
            {
              "checked_by":"60854943b67400006600628e",
              "checked_at": "05/09/21"
            },
            {
              "reviewed_by":"60854943b67400006600628d",
              "reviewed_at": "05/09/21"
            },
            {
              "noted_by":"60718bbdde580000250050ce",
              "noted_at": "05/09/21"
            }
            ]'),
        ],  
      
      ]);
    }
}
