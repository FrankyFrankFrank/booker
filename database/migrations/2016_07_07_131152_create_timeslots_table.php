<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->integer('visitor_id')->unsigned()->nullable();
            $table->time('time');
            // $table->boolean('is_assigned');
            // $table->enum('agent', ['Lidia Adamska', 'Dan Elliot']);
            $table->timestamps();
            //Checkout carbon timestamps

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('visitor_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('agent_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timeslots');
    }
}
