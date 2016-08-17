<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class)->create([
          'name' => 'Agent',
        ]);

        factory(App\Role::class)->create([
          'name' => 'Visitor',
        ]);

        factory(App\Role::class)->create([
          'name' => 'Admin',
        ]);

    }
}
