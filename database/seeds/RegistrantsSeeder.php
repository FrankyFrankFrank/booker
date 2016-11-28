<?php

use Illuminate\Database\Seeder;

use App\User;

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
          User::create([
            'name' => ucfirst(strtolower($reg['firstname'])) . " " . ucfirst(strtolower($reg['lastname'])),
            'email' => strtolower($reg['email']),
            'password' => bcrypt($reg['password']),
          ])->roles()->attach(3);
          echo $reg['firstname'] . $reg['lastname'] . " SUCCESS \r\n";
        } catch (Exception $e) {
          echo $reg['firstname'] . $reg['lastname'] . " error \r\n" . $e->getMessage() . "\r\n";
        }
      });

    }
}
