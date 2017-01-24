<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Draft;

class DraftUserTableSeeder extends Seeder
{
    /**
      * Run the database seeds.
      */
     public function run()
     {
         $users = User::all();
         $draft = Draft::first();

         foreach ($users as $key => $user) {
             $row = [
               'draft_id' => $draft->id,
               'user_id' => $user->id,
               'position' => $key + 1,
             ];

             DB::table('draft_user')->insert($row);
         }
     }
}
