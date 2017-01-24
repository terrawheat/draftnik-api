<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
      * Run the database seeds.
      */
     public function run()
     {
         $managers = [
         [
           'name' => 'Kitch',
           'email' => 'kitch@gmail.com',
         ],
         [
           'name' => 'Tobias',
           'email' => 'tobiaswhd@gmail.com',
         ],
         [
           'name' => 'Jason',
           'email' => 'jshelley@gmail.com',
         ],
         [
           'name' => 'Hadkiss',
           'email' => 'hadkiss@gmail.com',
         ],
         [
           'name' => 'Fintan',
           'email' => 'fin@gmail.com',
         ],
         [
           'name' => 'Dickens',
           'email' => 'dix@gmail.com',
         ],
         [
           'name' => 'Anthony',
           'email' => 'ant@gmail.com',
         ],
         [
           'name' => 'Rich',
           'email' => 'rich@gmail.com',
         ],
         [
           'name' => 'HTC',
           'email' => 'htc@gmail.com',
         ],
         [
           'name' => 'Nick',
           'email' => 'nick@gmail.com',
         ],
         [
           'name' => 'Chris',
           'email' => 'sudio@gmail.com',
         ],
         [
           'name' => 'Sol',
           'email' => 'sol@gmail.com',
         ],
       ];

         $password = app('hash')->make('draftnik');
         $now = date('Y-m-d H:i:s');
         foreach ($managers as &$s) {
             $s['created_at'] = $now;
             $s['updated_at'] = $now;
             $s['password'] = $password;
             User::create($s);
         }
     }
}
