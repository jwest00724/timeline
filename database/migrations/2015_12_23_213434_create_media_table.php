<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('credit')->nullable();
			$table->string('series');
			$table->string('medium');
			$table->string('summary', 1000)->nullable();
			$table->integer('timelineDate');
			$table->string('collection');
			$table->integer('numberInCollection')->nullable();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media');
    }
}
