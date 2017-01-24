<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('DraftsTableSeeder');
        $this->call('DraftUserTableSeeder');
        $this->call('PicksTableSeeder');
    }
}
