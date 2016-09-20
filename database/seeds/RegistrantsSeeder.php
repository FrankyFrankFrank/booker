<?php

use Illuminate\Database\Seeder;

class RegistrantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $data = json_decode(file_get_contents(env('SEED_PATH')), true);
      $registrants = collect($data['users']);

      $registrants->each( function($reg) {
        try{
          DB::table('users')->insert([
            'name' => $reg['name'],
            'email' => $reg['email'],
            'password' => bcrypt($reg['password']),
          ]);
        } catch (Exception $e) {
          echo $reg['name'] . " error \r\n" ;
        }
      });

    }
}
