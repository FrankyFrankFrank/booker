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
    public function testTimeslotFactoryWorks()
    {

        $user = factory(App\User::class, 5)->create(['role' => 'agent']);

        $timeslots = factory(App\Timeslot::class, 6)->create();

        $this->seeInDatabase('timeslots', ['id' => '6']);

    }
}
