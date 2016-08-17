<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FactoriesTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testTimeslotFactoryCreatesTimeslots()
    {

        $role = factory(App\Role::class)->create([
          'name' => 'Admin',
        ]);

        $user = factory(App\User::class, 5)->create()
        ->each(function ($user) {
          $user->roles()->attach(1);
        });

        $timeslots = factory(App\Timeslot::class, 6)->create();

        $this->seeInDatabase('timeslots', ['id' => '6']);

    }
}
