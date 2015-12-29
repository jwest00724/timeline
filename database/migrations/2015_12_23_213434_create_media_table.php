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
			$table->string('credit');
			$table->string('series');
			$table->string('medium');
			$table->string('summary');
			$table->date('timelineDate');
			$table->string('collection');
			$table->integer('numberInCollection');
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
