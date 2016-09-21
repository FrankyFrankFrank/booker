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
            'name' => $reg['name'],
            'email' => $reg['email'],
            'password' => bcrypt($reg['password']),
          ])->roles()->attach(3);
          echo $reg['name'] . " SUCCESS \r\n";
        } catch (Exception $e) {
          echo $reg['name'] . " error \r\n" . $e->getCode() . "\r\n";
        }
      });

    }
}
