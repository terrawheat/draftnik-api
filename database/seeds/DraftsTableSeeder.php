<?php

use Illuminate\Database\Seeder;
use App\Draft;

class DraftsTableSeeder extends Seeder
{
    /**
      * Run the database seeds.
      */
     public function run()
     {
         Draft::create([
             'name' => '2017 Chumbo Draft',
             'year' => 2017,
             'rounds' => 15,
         ]);
     }
}
