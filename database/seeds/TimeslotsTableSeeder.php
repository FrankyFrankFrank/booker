<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TimeslotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Timeslot::class, 16)->create();
    }
}
