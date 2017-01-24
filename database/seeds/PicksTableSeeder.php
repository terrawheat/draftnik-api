<?php

use Illuminate\Database\Seeder;
use App\Draft;

class PicksTableSeeder extends Seeder
{
    /**
      * Run the database seeds.
      */
     public function run()
     {
         $draft = Draft::first();
         $teams = $draft->users;
         $totalPicks = sizeof($teams) * $draft->rounds; // number of teams * number of rounds
         $picks = array();

         function getPickUser($pick, $totalPicks, $teams, $draft)
         {
             $leagueSize = sizeof($teams);
             $roundNumber = (($pick - 1) / $leagueSize) + 1;
             $position = (($pick - 1) % $leagueSize) + 1;
             if ($roundNumber % 2 == 0) {
                 $position = $leagueSize - $position + 1;
             }

             foreach ($teams as $user) {
                 if ($user->pivot->position == $position) {
                     return $user->id;
                 }
             }
         }

         for ($i = 1; $i <= $totalPicks; ++$i) {
             $picks[] = [
               'number' => $i,
               'draft_id' => $draft->id,
               'user_id' => getPickUser($i, $totalPicks, $teams, $draft),
             ];
         }

        // debug
        //  dd($picks);

        DB::table('picks')->insert($picks);
     }
}
